
# StackSwitcher

Welcome to **StackSwitcher**, the next-generation web development environment tailored for modern developers. With StackSwitcher, you can set up your development environment quickly and efficiently, giving you more time to focus on building great applications.

## Features

- **Quick Install**: Install your PHP/Node.js web development environment in just 3 minutes, with no dependencies and non-intrusive installation. Everything you need—including a web server, databases, email, DNS, and essential tools—comes bundled together.

- **Comprehensive Tools**: StackSwitcher will offer an extensive array of web development toolkits, including Caddy, PHP, Node.js, MySQL, MariaDB, PostgreSQL, Redis, memcached, and more, supporting both the latest and legacy versions.

- **High Performance**: Built natively for macOS with support for arm64 and x86_64 architectures, StackSwitcher operates in a non-virtualized environment, conserving system resources and providing optimized performance.

- **Robust Security**: StackSwitcher will feature the latest versions of software packages along with regular security updates. Upgrading to the most recent and secure versions will be a simple one-click process.

- **Multiple PHP Instances**: Support for various PHP versions from 5.6 to 8.4, allowing you to run multiple instances concurrently and easily switch between them.

- **Multiple Node.js Support**: Native support for Node.js versions ranging from v12 to v22, enabling you to run multiple versions simultaneously without the hassle of external tools.

- **Custom Domain and SSL Support**: Support for non-standard TLDs and SSL certification for custom domain names, ensuring secure and seamless access to your local projects.

- **Command Line Support**: Interact directly with services like PHP, MySQL, and Redis from the terminal, streamlining your development workflows.

- **Unified Service Management**: A powerful service management panel to install, update, disable, or uninstall service suites of different versions, with continuous access to new software and services.

- **Isolated Installation**: All StackSwitcher files will be stand-alone and non-invasive, ensuring they don’t interfere with your operating system. You can easily move or delete them as needed.

- **Startup with macOS**: Configure StackSwitcher to start automatically with your system, ensuring your services are always ready to go. Manage your services swiftly from the menu bar.

## Upcoming Features

We’re continuously working to enhance **StackSwitcher**! Here’s what you can look forward to:

- **Support for Multiple MySQL Instances**: Manage various MySQL versions and switch between them with ease.
- **NGINX Support**: Full support for NGINX web server as an alternative option.
- **Reverse Proxy Features**: Bind local Docker, Node.js, and other applications to your host, with SSL support for domain-based access on ports 80/443.
- **Integrated DNS Management**: Simplify network request management with built-in DNS server capabilities.
- **Advanced Backup and Restore Options**: Ensure your development environments are secure and easily recoverable.
- **Development Libraries**: Access to a library of development tools and libraries for efficient project setup and management.

Stay tuned for these features and more as we continue to improve **StackSwitcher**!

How to run the StackSwitcher:

## Installation


1. **Navigate to the root directory:**

   ```bash
   cd StackSwitcher
   ```
2. Install electron & nodejs

   ```bash
   npm install
   ```

   ```bash
   npm install electron --save-dev
   ```
   
3. Run the development instance
   
   ```bash
   npx electron .
   ```


How to run our StackSwitcher Apps:

# StackSwitcherDBM

An easy to use Laravel app that allows users to connect to a their favourite DB servers ( currently supports MYSQL only), view available databases, select a database, view its tables, and run SQL queries.

## Features

- Connect to a MySQL server using provided credentials.
- View all available databases on the server.
- Select a database to explore its tables.
- Run custom SQL queries against the selected database.
- View query results in a user-friendly format.

## Requirements

- PHP >= 7.3
- Laravel >= 8.x
- MySQL Server

## Installation


1. **Navigate to the project directory:**

   ```bash
   cd apps/StackSwitcherDBM
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Set up the environment file:**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

   Update the `.env` file with your application settings, including the database connection details.

5. **Generate the application key:**

   ```bash
   php artisan key:generate
   ```

6. **Run database migrations (if any):**

   ```bash
   php artisan migrate
   ```

7. **Start the Laravel development server:**

   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Usage

1. Open your web browser and navigate to `http://localhost:8000`.
2. Enter your MySQL server credentials (host, port, username, and password).
3. Click the "Connect" button to fetch available databases.
4. Select a database to view its tables.
5. Run your desired SQL queries in the provided text area and click "Run Query" to see results.

## Error Handling

- If you encounter any issues connecting to the MySQL server or running queries, check the Laravel log files located in the `storage/logs/` directory for more details.

