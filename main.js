const { app, BrowserWindow, ipcMain } = require('electron');
const path = require('path');
const { exec } = require('child_process');
const os = require('os');
const net = require('net');


let phpProcess = null;  // Track the running PHP process

// Function to determine the correct PHP path based on OS and version
function getPHPPath(version) {
  const platform = os.platform();

  if (platform === 'win32') {
    // For Windows
    return path.join(__dirname, `bin/php${version}/php.exe`);
  } else if (platform === 'darwin') {
    // For macOS (Homebrew paths)
    return `/opt/homebrew/opt/php@${version}/bin/php`;
  } else {
    // For Linux (if needed, adjust this path based on your setup)
    return path.join(__dirname, `bin/php${version}/php`);
  }
}

// Function to start PHP server for the selected version
function startPHP(version) {
  if (phpProcess) {
    phpProcess.kill();  // Kill any previously running PHP process
  }

  const phpPath = getPHPPath(version);
  
  phpProcess = exec(`${phpPath} -S localhost:8000 -t ${__dirname}/www`, (err, stdout, stderr) => {
    if (err) {
      console.error(`Error starting PHP: ${stderr}`);
    } else {
      console.log(`PHP ${version} Server started: ${stdout}`);
    }
  });

  phpProcess.stdout.on('data', (data) => {
    // Filter out non-error messages if needed
    if (!data.includes("Development Server")) {
      console.log(`PHP Output: ${data}`);
    }
  });

  phpProcess.stderr.on('data', (data) => {
    console.error(`PHP Error: ${data}`);
  });

  phpProcess.on('exit', (code) => {
    console.log(`PHP server exited with code ${code}`);
    phpProcess = null;  // Clear the phpProcess variable
  });
}

// Create the Electron window
function createWindow() {
  const mainWindow = new BrowserWindow({
    width: 800,
    height: 600,
    webPreferences: {
      preload: path.join(__dirname, 'preload.js'),
      nodeIntegration: true, // Required to use ipcRenderer in the frontend
      contextIsolation: false,
    },
  });

  mainWindow.loadFile('index.html');

  // Handle PHP version switch from the frontend
  ipcMain.on('switch-php-version', (event, version) => {
    startPHP(version);
    event.reply('php-switch-status', `Switched to PHP ${version} and started the server.`);
  });
}

app.whenReady().then(() => {
  createWindow();

  app.on('activate', () => {
    if (BrowserWindow.getAllWindows().length === 0) createWindow();
  });
});

app.on('window-all-closed', () => {
  if (phpProcess) {
    phpProcess.kill();  // Ensure PHP process is killed when window is closed
  }
  if (process.platform !== 'darwin') app.quit();
});
