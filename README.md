

## Description

Uuser registration and login functionality using Laravel, including role-based access control and email verification.

### Features:

- **Customer Registration Page**: Allows users to register as customers.
- **Admin Registration Page**: Allows users to register as admins.
- **Email Verification**: Both customer and admin registration pages include email verification functionality.
- **Role Assignment**: 
  - Users who register on the **Customer Registration** page are assigned the `customer` role.
  - Users who register on the **Admin Registration** page are assigned the `admin` role.
- **Admin Login Page**: Admin users can log in with email and password.
  - If a **customer** attempts to log in using the admin login page, an error message "You are not allowed to login from here" will be shown.
  
## Setup

To set up this project locally, follow the steps below:

### Prerequisites

Ensure that you have the following installed on your machine:
- Laravel 10 - PHP Framework for building the application
- PHP >= 8.1.25
- Composer (PHP dependency manager)
- MySQL

### 1. Clone the repository

Clone this repository to your local machine:

### Project Setup
- Composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- composer require spatie/laravel-permission
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
- php artisan migrate
- php artisan db:seed
- npm install
- npm run dev
- php artisan serve

### Route
 - http://127.0.0.1:8000/customer-register For Cutomer Register
 - http://127.0.0.1:8000/admin-register For Admin Register
 - http://127.0.0.1:8000/login  for customer login
 - http://127.0.0.1:8000/admin/login  for admin login

```bash
git clone https://github.com/jigssuthar/techerudite-practical


