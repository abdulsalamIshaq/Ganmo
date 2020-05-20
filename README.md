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
class Blog extends Controller {

     public function index() {
          echo 'Hello World!';
     }
}
```
Then save the file to your App/controllers/ directory.

###### Note => 
1. **The controller name must be same as the class name.**
2. **Class names must start with an uppercase letter.**
3. **always make sure your controller extends the parent controller class so that it can inherit all its methods.** 
     
     so The file must be called ‘Blog.php’, with a capital ‘B’ .

Now visit the your site using a URL similar to this:

```
example.com/Blog/
```

If you did it right, you should see:
```
Hello World!
```
#### Methods
In the above example the method name is index(). The “index” method is always loaded by default if the second segment of the URI is empty. Another way to show your “Hello World” message would be this:
```
example.com/Blog/index/
```
###### The second segment of the URI determines which method in the controller gets called.

``` PHP
class Blog extends Controller {

     public function index() {
          echo 'Hello World!';
     }

     public function posts() {
          echo 'Nice Post';
     }
}
```
Now load the following URL to see the comment method:

```
example.com/Blog/posts/
```
You should see your new message "Nice Post".

#### Passing URI Segments to your methods

If your URI contains more than two segments they will be passed to your method as parameters.

For example, let’s say you have a URI like this:

```
example.com/Users/profile/Ishaq/123
```
Your method will be passed URI segments 3 and 4 (“sandals” and “123”):

``` PHP
class Users extends Controller {

     public function profile($name, $id) {
          echo $name;
          echo $id;
     }
}
```
#### Defining a Default Controller

Ganmo can be told to load a default controller when a URI is not present, as will be the case when only your site root URL is requested. To specify a default controller, open your App/config/config.php file and set this variable:

``` PHP
define('DEFAULT_CONTROLLER', 'Welcome');
```
### views

A view is simply a web page, or a page fragment, like a header, footer, sidebar, etc. In fact, views can flexibly be embedded within other views (within other views, etc., etc.) if you need this type of hierarchy.

Views are never called directly, they must be loaded by a controller. Remember that in an MVC framework, the Controller acts as the traffic cop, so it is responsible for fetching a particular view. If you have not read the Controllers page you should do so before continuing.

Using the example controller you created in the controller page, let’s add a view to it.

#### Creating a View

``` HTML
<html>
<head>
        <title>My Blog</title>
</head>
<body>
        <h1>Welcome to my Blog!</h1>
</body>
</html>
```

Then save the file in your App/views/ directory.

#### Loading a View

To load a particular view file you will use the following method:

``` PHP
$this->view('name');
```
Where name is the name of your view file.

#### Note => 
The .php file extension does not need to be specified unless you use something other than .php.

Now, open the controller file you made earlier called Blog.php, and replace the echo statement with the view loading method:

``` PHP
class Blog extends Controller {

     public function index() {
        $this->view('blogView');
     }
}
```

If you visit your site using the URL you did earlier you should see your new view. The URL was similar to this:

```
example.com/Blog/
```

#### Loading multiple views
Ganmo will intelligently handle multiple calls to $this->view() from within a controller. If more than one call happens they will be appended together. For example, you may wish to have a header view, a menu view, a content view, and a footer view. That might look something like this:
``` PHP
class Page extends Controller {

     public function index()
     {
          $data['page_title'] = 'Your title';
          $this->view('header');
          $this->view('menu');
          $this->view('content', $data);
          $this->view('footer');
     }

}
```
In the example above, we are using “dynamically added data”, which you will see below.

#### Storing Views within Sub-directories

Your view files can also be stored within sub-directories if you prefer that type of organization. When doing so you will need to include the directory name loading the view. Example:

``` PHP
$this->view('directory_name/file_name');
```

#### Adding Dynamic Data to the View

Data is passed from the controller to the view by way of an **array** or an **object** in the second parameter of the view loading method. Here is an example using an array:

``` php
$data = array(
        'title' => 'My Title',
        'heading' => 'My Heading',
        'message' => 'My Message'
);

$this->view('blogview', $data);
```
#### Let’s try it with your controller file. Open it add this code:
``` php
class Blog extends Controller {

     public function index()
     {
          $data['title'] = "My Real Title";
          $data['heading'] = "My Real Heading";

          $this->view('blogview', $data);
     }
}
```
Now open your view file and change the text to variables that correspond to the array keys in your data:

``` HTML
 <html>
 <head>
     <title><?php echo $title; ?></title>
 </head>
 <body>
     <h1><?php echo $heading; ?></h1>
 </body>
 </html>
```
Then load the page at the URL you’ve been using
#### Creating Loops
The data array you pass to your view files is not limited to simple variables. You can pass multi dimensional arrays, which can be looped to generate multiple rows. For example, if you pull data from your database it will typically be in the form of a multi-dimensional array.


Here’s a simple example. Add this to your controller:
``` PHP
class Blog extends Controller {

    public function index()
    {
        $data['todo'] = array('Animal', 'Place', 'Things');

        $data['title'] = "My Real Title";
        $data['heading'] = "My Real Heading";

        $this->view('blogview', $data);
    }
}
```
Now open your view file and create a loop:
``` HTML
 <html>
 <head>
     <title><?php echo $title; ?></title>
 </head>
 <body>
     <h1><?php echo $heading; ?></h1>
     <ul>
         <?php foreach ($todo as $item) : ?>

             <li><?php echo $item; ?></li>

         <?php endforeach; ?>
     </ul>
 </body>
 </html>
```
#### Alternative Echos
Normally to echo, or print out a variable you would do this:
``` Php
<?php
echo $variable;
?>
```
With the alternative syntax you can instead do it this way:
``` php
<?=$variable?>
```
#### Alternative Control Structures
Controls structures, like if, for, foreach, and while can be written in a simplified format as well. Here is an example using foreach:
``` HTML
<ul>
<?php foreach ($todo as $item): ?>
        <li><?=$item?></li>
<?php endforeach; ?>
</ul>
```
Notice that there are no braces. Instead, the end brace is replaced with endforeach. Each of the control structures listed above has a similar closing syntax: **endif**, **endfor**, **endforeach**, and **endwhile**

Also notice that instead of using a semicolon after each structure (except the last one), there is a colon. This is important!

Here is another example, using **if/elseif/else**. Notice the colons:
``` HTML
<?php if ($username === 'sally'): ?>

        <h3>Hi Sally</h3>

<?php elseif ($username === 'joe'): ?>

        <h3>Hi Joe</h3>

<?php else: ?>

        <h3>Hi unknown user</h3>

<?php endif; ?>
```
### Models
Models are PHP classes that are designed to work with information in your database. For example, let’s say you use Gamo to manage a blog. You might have a model class that contains functions to **insert**, and **retrieve** your blog data. Here is an example of what such a model class might look like:
``` PHP
class Post extends Model {

    public function get_all_post_data() {
        $query = $this->db->query('SELECT * FROM post');
        $result =  $this->db->fetch($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function insert_post() {
        $query = $this->db->query('INSERT INTO post VALUES (:title, :body)');
        $this->db->bind(array(
            'title' => $_POST['title'],
            'body' => $_POST['body']
        ));
        if($this->db->execute()) {
        return true;
        } else {
        return false;
        }
    }
}
```
#### Loading a Model
Your models will typically be loaded and called from within your controller methods. To load a model you will use the following method:
``` PHP
$this->model('model_name');
```
If your model is located in a sub-directory, include the relative path from your models directory. For example, if you have a model located at App/models/blog/Queries.php you’ll load it using:
``` Php
$this->model('blog/queries');
```
Once loaded, you will access your model methods by setting the model to a variable:
``` PHp
$this->variable = $this->model('model_name');

$this->variable->method();
```
Here is an example of a controller, that loads a model, then serves a view:
``` PHP
<?php

class Blog extends Controller
{
	public function __construct() {
		$this->Blog = $this->model('Post');
	}
    public function index()
    {
        $data['post'] = $this->Blog->get_all_post_data();

        $this->view('blogview', $data);
    }
}
```
#### Connecting to your Database
When a model is loaded it does NOT connect automatically to your database you need to edit App/config/config.php and fill the details
``` PHP
define('DB_HOST', 'localhost');
define('DB_USER', '_USERNAME_');
define('DB_PASS', '_PASSWORD_');
define('DB_NAME', '_DBNAME_');
```
### Helper Functions
## Documentation
More documentation coming soon..

## Built With

* PHP
* Mysql(pdo)

## License

This project is licensed under the MIT License

