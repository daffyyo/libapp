# Online Lib

## Tech Stack
    MySQL
    PHP Laravel
    HTML/Javascript/Bootstrap

## Step to Run the application locally

Follow the steps below to run the online lib base locally:  
1. Install [composer](https://getcomposer.org/)  
2. Install the Laravel Installer as a global Composer dependency:  
    `composer global require laravel/installer`  
3. Clone the repository to local.  
4. Go to the root directory of the libapp, run following commands respectively:  
`composer update`  
`php artisan cache:clear`  
`php artisan config:clear`  
`php artisan key:generate`  
5. Make sure you have MySQL up and running on your local machine, and replace the db connection information in `.env` file, located at the root dir of libapp:  
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=onlinelib
    DB_USERNAME=your user name here
    DB_PASSWORD=your password here
    ```
6. Execute `create.sql` and `insert.sql` under mysqlDump directory respectively in your mysql command line or MySql GUI tool.
7. Go to project directory, run: `php artisan serve`, you should then see output like following:    
```
libapp git:(main) php artisan serve
Starting Laravel development server: http://127.0.0.1:8000
```
8. The online library application is up and running when you go to the path above in browser!