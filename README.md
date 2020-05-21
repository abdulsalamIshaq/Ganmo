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
* Make a clone of this project from github
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
### Helper 
Helpers, as the name suggests, help you with tasks. Each helper file is simply a collection of functions in a particular category.

Helpers are load automatically in Ganmo not in other frameworks like codeigniter.

list of built in helplpers 
1. array helpers
2. email helpers
3. html helpers
4. string helpers
5. url helpers

Note as said above this project is in  nascence version, If you develope interest in this project you are welcome to add more helpers function 
##### coding custome helpers function 
user must save his/her helper function with the suffix **_helpers**, function will be load automatically
##### array helpers
The Array Helper file contains functions that assist in working with arrays.
**Element Helper**
Lets you fetch an item from an array. The function tests whether the array index is set and whether it has a value. If a value exists it is returned. If a value does not exist it returns NULL, or whatever you’ve specified as the default value via the third parameter.

``` PHP
$array = array(
        'name' => 'Ganmo',
        'Language' => 'PHP',
        'version'  => 'PHP 7'
);

echo element('name', $array); // returns "Ganmo"
echo element('Language', $array); // returns "PHP"
echo element('version', $array); // returns "PHP 7"
```
**Random Array**
Takes an array as input and returns a random element from it.
``` PHP
$quotes = array(
        "I find that the harder I work, the more luck I seem to have. - Thomas Jefferson",
        "Don't stay in bed, unless you can make money in bed. - George Burns",
        "We didn't lose the game; we just ran out of time. - Vince Lombardi",
        "If everything seems under control, you're not going fast enough. - Mario Andretti",
        "Reality is merely an illusion, albeit a very persistent one. - Albert Einstein",
        "Chance favors the prepared mind - Louis Pasteur"
);

echo random_array($quotes);
```
##### Email helpers
The Email Helper provides some assistive functions for working with Email. For a more robust email solution, see Ganmo's Email Class.

**Available Functions**

The following functions are available:
1. 
``` PHP
validate_email($email);
```
This function returns TRUE if a valid email is supplied, FALSE otherwise
**Example**
``` PHP
if (validate_email('email@ganmo.com'))
{
        echo 'email is valid';
}
else
{
        echo 'email is not valid';
}
```
2. 
``` PHP
send($recipient, $subject, $message)
```
This function returns TRUE if the mail was successfully sent, FALSE in case of an error

Sends an email using PHP’s native mail() function.
``` PHP
send($recipient, $subject, $message)
```
##### HTML helper
The HTML Helper file contains functions that assist in working with HTML.

**Available Functions**
The following functions are available:

1. 
``` Php
h([$data = ''[, $h = '1'[, $attributes = '']]]);
```
returns an HTML heading tag

Lets you create HTML heading tags. The first parameter will contain the data, the second the size of the heading. Example:

``` php
echo h('Welcome!', 3);
```
The above would produce: <h3>Welcome!</h3>

Additionally, in order to add attributes to the heading tag such as HTML classes, ids or inline styles, a third parameter accepts either a string or an array:

``` php
echo h('Welcome!', 3, 'class="pink"');
echo h('How are you?', 4, array('id' => 'question', 'class' => 'green'));
```
The above code produces:
``` Html
<h3 class="pink">Welcome!<h3>
<h4 id="question" class="green">How are you?</h4>
```

2. 
``` php 
p($data = '', $attributes = '');
```

returns an HTML heading tag

Lets you create HTML paragraph tags. Example:
```php
echo p('Hello World');
echo p('Hello World', 'class="paragraph"');
echo p('Hello World', array( 'class' => 'para', 'id' => 'para'));
```
This will produce 
``` html
<p>Hello world</p>
<p class="paragraph">Hello world</p>
<p class = 'para' id = 'para'>Hello world</p>
```
This same way you use paragraph function, the same way you will use the following functions
1. b()              5. small()          9. sup()
2. strong()         6. del()
3. i()              7. ins()
4. em()             8. sub()

3. br tag function
``` php
br([$count = 1])
```
Returns: HTML line break tag

Generates line break tags (<br />) based on the number you submit. Example:
``` php
echo br(3);
```
The above would produce:
``` html
<br /><br /><br />
```
4. 
``` php
nbs([$num = 1])
```
Generates non-breaking spaces (&nbsp;) based on the number you submit. Example:
``` php
echo nbs(3);
```
The above would produce:
``` html
&nbsp;&nbsp;&nbsp;
```
If you develope interest for this project you can add more html helpers to the little have added

##### string Helpers
The String Helper file contains functions that assist in working with strings.

**Available Functions**
The following functions are available:
``` php
__($string);
```
Return or print strings
``` php
echo __('Hello');
``` 
this will output 
``` html
Hello
```
1. 
``` php
repeat($data, $num = 1)
```
returns Repeated string

Generates repeating copies of the data you submit. Example:

``` php
$string = "\n";
echo repeat($string, 30);
```
The above would generate 30 newlines.

2. 
``` php
token()
```
generates a random string as token
``` php
echo token();
```
output
``` html
61970b78d45a61fd6c8f137820fa5e78eaff246524d4cb6731fda9e0d6978e08
```
3. die and dump
``` php 
dd($string, $default = 'NULL')
```
this function is same as var_dump()
``` php
$array = array(
        'name' => 'Ganmo',
        'Language' => 'PHP',
        'version'  => 'PHP 7'
);

dd($array);
```
this returns
``` php
array(3) { ["name"]=> string(5) "Ganmo" ["Language"]=> string(3) "PHP" ["version"]=> string(5) "PHP 7" }
```

##### url helper
The URL Helper file contains functions that assist in working with URLs.

**Available Functions**

The following functions are available:
1. Site URL
``` php
url($url)
```
Returns: Site URL

``` php
url('news/local/123')
```
Returns your site URL, as specified in your config file. The index.php file (or whatever you have set as your site index_page in your config file) will be added to the URL, as will any URI segments you pass to the function, plus the url_suffix as set in your config file.

You are encouraged to use this function any time you need to generate a local URL so that your pages become more portable in the event your URL changes.

Segments can be optionally passed to the function as a string or an array. Here is a string example:

The above example would return something like: http://example.com/index.php/news/local/123

2. redirect
``` php
redirect($url)
```
redired to a specified url
``` php
redirect('/Home');
```
this will redired from current url to http://example.com/Home
#### libraries 
Libraries are still in developement
 
## Documentation
More documentation coming soon..

## Built With

* PHP
* Mysql(pdo)

## License

This project is licensed under the MIT License

