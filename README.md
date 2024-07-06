## Project setup

1. Clone the repository
2. Create a .env file using the example env file here
3. Create a database table in your local phpMyAdmin, set the database parameters in the newly created .env file
4. Generate the App key using the command 'php artisan key:gen'
5. Run the migrations using the command 'php artisan migrate'
6. Install the PHP dependencies using the command 'composer install'
7. Install the javascript dependencies using the command 'npm install'
8. Start the laravel local server using the command 'php artisan serve'

This should get you up and running. Also, I have included a sample database with test data that can be used to bootstrap the application.
