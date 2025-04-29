# PHP Task Application

## Description
This PHP Task Application allows users to create, view, and manage tasks. It provides a simple interface for adding tasks to a database and displaying them in a user-friendly format.

## Project Structure
```
php-task-app
├── src
│   ├── index.php          # Entry point of the application
│   ├── add_task.php       # Handles task addition
│   ├── view_tasks.php      # Displays the list of tasks
│   ├── db
│   │   └── connection.php  # Database connection setup
│   └── templates
│       ├── header.php      # HTML header template
│       └── footer.php      # HTML footer template
├── public
│   └── css
│       └── styles.css      # CSS styles for the application
├── database
│   └── schema.sql          # SQL schema for the database
└── README.md               # Project documentation
```

## Requirements
- PHP 7.4 or higher
- MySQL database

## Setup Instructions
1. **Clone the repository**:
   ```
   git clone <repository-url>
   cd php-task-app
   ```

2. **Set up the database**:
   - Create a MySQL database for the application.
   - Run the SQL commands in `database/schema.sql` to create the necessary tables.

3. **Configure database connection**:
   - Edit `src/db/connection.php` to include your database credentials.

4. **Run the application**:
   - Start a local PHP server:
     ```
     php -S localhost:8000 -t src
     ```
   - Open your browser and navigate to `http://localhost:8000/index.php` to access the application.

## Features
- Add new tasks to the database.
- View all tasks in a list format.
- Simple and clean user interface.

## License
This project is licensed under the MIT License.