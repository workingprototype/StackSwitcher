const { app, BrowserWindow } = require('electron');
const path = require('path');
const { exec } = require('child_process');

// Paths to PHP and Apache binaries
const phpPath = path.join(__dirname, 'bin/php/php.exe'); // For Windows (use appropriate path for macOS/Linux)
const apachePath = path.join(__dirname, 'bin/apache/apache.exe'); // For Windows (use appropriate path for macOS/Linux)

// Function to start PHP server
function startPHP() {
  exec(`${phpPath} -S localhost:8000 -t ${__dirname}/www`, (err, stdout, stderr) => {
    if (err) {
      console.error(`Error starting PHP: ${stderr}`);
    } else {
      console.log(`PHP Server started: ${stdout}`);
    }
  });
}

// Function to start Apache server
function startApache() {
  exec(`${apachePath} -k start`, (err, stdout, stderr) => {
    if (err) {
      console.error(`Error starting Apache: ${stderr}`);
    } else {
      console.log(`Apache Server started: ${stdout}`);
    }
  });
}

// Create the Electron window and start servers
function createWindow() {
  const mainWindow = new BrowserWindow({
    width: 800,
    height: 600,
    webPreferences: {
      preload: path.join(__dirname, 'preload.js'),
    },
  });

  mainWindow.loadFile('index.html');
  startPHP();
  startApache();
}

app.whenReady().then(() => {
  createWindow();

  app.on('activate', () => {
    if (BrowserWindow.getAllWindows().length === 0) createWindow();
  });
});

app.on('window-all-closed', () => {
  if (process.platform !== 'darwin') app.quit();
});
