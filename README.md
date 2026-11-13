# Admin Panel

A Laravel-based administration panel built as a practice project to develop my PHP and Laravel skills. The application provides an interface for managing companies and employees, with authentication, data validation, database relationships and company logo management.

## Features

### Authentication
- Secure login functionality.
- User registration disabled to restrict account creation.
- Protected dashboard and management routes.
- Logout functionality.

### Dashboard
- Overview of total companies and employees.
- Statistics showing assigned and unassigned employees.
- Recently added companies and employees.
- Quick navigation to management sections.

### Company Management
- Create, view, edit and delete company records.
- Store company details including name, email and website.
- Upload, replace and remove company logos.
- Display company records in a paginated table.

### Employee Management
- Create, view, edit and delete employee records.
- Store employee details including name, email and telephone number.
- Assign employees to companies.
- Support employees without an assigned company.
- Display associated company information.

### Validation and Data Management
- Server-side validation using dedicated Laravel Form Request classes.
- Database relationships using Eloquent ORM.
- Database migrations and seeders.
- File storage for uploaded company logos.

## Technologies Used

- **PHP** – Backend application logic.
- **Laravel 13** – PHP framework.
- **MySQL** – Relational database.
- **Bootstrap 5** – Responsive UI framework.
- **Sass** – Custom styling.
- **JavaScript** – Frontend functionality.
- **Blade** – Laravel templating engine.
- **Vite** – Frontend asset compilation.
- **Laravel UI** – Authentication scaffolding.

## Installation

### Requirements

- PHP 8.4 or later.
- Composer.
- Node.js and npm.
- MySQL.

### 1. Clone the repository

```bash
git clone https://github.com/BenDavies620/Laravel-Admin-Panel
cd admin-panel
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure the environment

Copy the example environment file:

```bash
cp .env.example .env
```

Generate an application key:

```bash
php artisan key:generate
```

Update your `.env` file with your local MySQL database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel
DB_USERNAME=root
DB_PASSWORD=
```

Create a database matching the name specified in your environment configuration.

### 4. Run database migrations and seed the admin account

```bash
php artisan migrate --seed
```

This will create the required database tables and seed the initial administrator account.

### 5. Configure file storage

Create the public storage symlink:

```bash
php artisan storage:link
```

### 6. Build frontend assets

For development:

```bash
npm run dev
```

Alternatively, compile the production assets:

```bash
npm run build
```

### 7. Start the application

In a separate terminal, run:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Admin Login

The database seeder creates an initial administrator account:

| Field | Value |
|---|---|
| Email | admin@admin.com |
| Password | password |

**Important:** These are development credentials only. Change them before using the application in any environment beyond local practice.

## Project Structure

The application follows Laravel's MVC architecture:

- `app/Http/Controllers` – Handles application requests and business logic.
- `app/Http/Requests` – Contains dedicated form validation rules.
- `app/Models` – Defines Eloquent models and database relationships.
- `database/migrations` – Defines the database structure.
- `database/seeders` – Provides initial database records.
- `resources/views` – Contains Blade templates.
- `resources/sass` – Contains the application's Sass stylesheets.
- `resources/js` – Contains JavaScript functionality.
- `routes/web.php` – Defines application routes.

## Learning Objectives

This project was developed to gain practical experience with Laravel and modern PHP development, particularly:

- Understanding Laravel's MVC architecture.
- Working with Eloquent models and relationships.
- Building CRUD functionality.
- Implementing authentication and route middleware.
- Handling server-side form validation.
- Managing file uploads and storage.
- Working with database migrations and seeders.
- Organising frontend assets using Sass and Vite.