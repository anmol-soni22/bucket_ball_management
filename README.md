# Project Name : Bucket Ball Management

## Installation Guide

Follow these steps to get the project up and running on your local machine.

### 1. Clone the Repository

```bash
git clone <repository_url>
cd <project_directory>
```

### 2. Navigate to the Project Directory:

```bash
cd bucket_ball_management
```
Change directory to the "bucket_ball_management" project directory.


### 3. Copy Environment File:

```bash
cp example.env .env
```
Create a new .env file from the provided example.env file. Remember to configure the environment variables in the .env file according to your setup.


### 4. Install PHP Dependencies:
```bash
composer install
```
This command installs the PHP dependencies specified in the composer.json file.

### 5. Install JavaScript Dependencies:

```bash
npm install
```
This command installs the JavaScript dependencies specified in the package.json file.

### 6. Build Frontend Assets:

```bash
npm run dev
```
This command compiles and builds the frontend assets.

### 7. Run Migrations:

```
php artisan migrate
```
Execute any pending database migrations.

### 8. Start the Development Server:
```
php artisan serve
```
This command starts the PHP development server. Access the project in your web browser at http://localhost:8000.
