const { app, BrowserWindow, ipcMain } = require('electron');
const path = require('path');
const { exec } = require('child_process');

let phpProcess = null;  // Track the running PHP process

// Function to start PHP server for the selected version
function startPHP(version) {
  if (phpProcess) {
    phpProcess.kill();  // Kill any previously running PHP process
  }

  const phpPath = path.join(__dirname, `bin/php${version}/php.exe`); // Adjust for Linux/macOS
  
  phpProcess = exec(`${phpPath} -S localhost:8000 -t ${__dirname}/www`, (err, stdout, stderr) => {
    if (err) {
      console.error(`Error starting PHP: ${stderr}`);
    } else {
      console.log(`PHP ${version} Server started: ${stdout}`);
    }
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
