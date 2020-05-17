# Ganmo
Ganmo php MVC framework created by [Abdulsalam Ishaq](https://github.com/kayode-suc) For learning purpose to improving my php skills

### Disclaimer

This project is in nascence version,
If you develope interest in this project by helping out with solving some bugs and developing new features you are welcome to do so.

## Getting Started with Ganmo MVC framework

Make a copy of this project, by clonning or downloading it from the repository, 
Copy the project in your development folder. 

Follow the instructions to complete the installation.

### Installation

* Apache Server
* PHP 6+
* Mysql Database

#### Note this project wount work on php 6 downward version 

Install Latest version [XAMPP](https://www.apachefriends.org/it/index.html) for an easy quickstart on windows

Install Latest version [MAMPP](https://www.mamp.info/en/downloads/) for an easy quickstart for mac 

Or use whatever suit you.

### Folder structure
Ganmo

``` 
  |____App 
       |____config 
            |____config.php 
       |____controllers
            |____controllers codes goes here
       |____helpers
       |____libraries
       |____models
            |____db models
       |____views
            |____ view files goes here
       |____.htaccess
       |____bootstrap.php
  |____public
            |____css
            |____js
            |____uploads
       |____.htaccess
       |____index.php
  |____.htaccess
```  

### Configuration File

Modify the app/config/config.php file according to your needs.

``` PHP
//Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', '_USERNAME_');
define('DB_PASS', '_PPASSWORD_');
define('DB_NAME', '_DBNAME_');

//Controller Settings
define('DEFAULT_CONTROLLER', 'Welcome');

// App Root 
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('BASE_URL', '_YOUR_URL_');

// Site Name
define('SITENAME', '_YOUR_SITENAME_');
```
Set your default controller to be index automatically as your BASE_URL is being visit


### Htaccess file

Modify the .htaccess file inside the public folder to match the name of your installation folder,
Modify only the RewriteBase to /__PROJECT_ROOT_FOLDER__/public.

```
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On 
  RewriteBase /Ganmo/public 
  RewriteCond %{REQUEST_FILENAME} !-d 
  RewriteCond %{REQUEST_FILENAME} !-f 
  RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```
### Controllers
A Controller is simply a class file that is named in a way that can be associated with a URI.
Controllers are the heart of your application, as they determine how HTTP requests should be handled.

**Consider this URI:**

``` PHP
<?php
class Blog extends Controller {

        public function index()
        {
                echo 'Hello World!';
        }
}
```
Then save the file to your App/controllers/ directory.

######Note => The controller name must be same as the class name so
               
               The file must be called ‘Blog.php’, with a capital ‘B’ .

Now visit the your site using a URL similar to this:

```
example.com/index.php/blog/
```


## Documentation
More documentation coming soon..

## Built With

* PHP
* Mysql(pdo)

## License

This project is licensed under the MIT License

