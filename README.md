# Assignment : Assignment 2

### Name : Ali Nishu

### Email: nishu.ptg@gmail.com

---

## Basic Project Structure

This project draws inspiration from modern PHP frameworks like Laravel. However, I have tailored the implementation to be lightweight to fit the specific needs of this assignment, intentionally avoiding the overheads and complexities of more robust, production-heavy frameworks.  

```text
├── app/                    # Namespaced Files
│   ├── Controllers/        # Auth & UserController
│   └── DB.php              # PDO Database Wrapper
├── public/                 # Web Accessible Directory
│   └── index.php           # Main Entry Point
├── views/                  # UI Section
│   ├── auth/               # Signup & Login
│   ├── user/               # Profile & Dashboard
│   ├── layouts/            # main, auth, _sidebar, _header etc.
│   ├── icons/              # SVG Files
│   ├── _alerts.php         # Session Flash Message
│   ├── _input.php          # Reusable Form Input
│   └── error.php           # Error Page
├── config.example.php      # Configuration Template
├── db_schema.sql           # Simple Database Structure
├── helpers.php             # view, redirect, config, abort etc.
├── routes.php              # URL Definitions
└── composer.json           # Dependency Management
```
---

## Installation & Setup

```cmd
composer install
cp config.example.php config.php
composer migrate
php -S localhost:8000 -t public
```

---

## Database Management
```cmd
composer migrate
composer rollback
composer refresh
```

**Note:** The Database commands are custom Composer scripts defined in `composer.json`.  
They call methods from `App\Controllers\DbController` to manage the database schema.


