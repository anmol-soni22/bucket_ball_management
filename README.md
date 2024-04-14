Clone the Repository:

bash
Copy code
git clone <repository_URL>
Replace <repository_URL> with the URL of this Git repository.

Navigate to the Project Directory:

bash
Copy code
cd bucket_ball_management
Change directory to the "bucket_ball_management" project directory.

Copy Environment File:

bash
Copy code
cp example.env .env
Create a new .env file from the provided example.env file. Remember to configure the environment variables in the .env file according to your setup.

Install PHP Dependencies:

Copy code
composer install
This command installs the PHP dependencies specified in the composer.json file.

Install JavaScript Dependencies:

Copy code
npm install
This command installs the JavaScript dependencies specified in the package.json file.

Build Frontend Assets:

arduino
Copy code
npm run dev
This command compiles and builds the frontend assets.

Run Migrations:

Copy code
php artisan migrate
Execute any pending database migrations.

Start the Development Server:

Copy code
php artisan serve
This command starts the PHP development server. Access the project in your web browser at http://localhost:8000.
