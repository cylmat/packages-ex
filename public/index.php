<?php declare(strict_types=1);

ini_set('display_errors','on');
error_reporting(E_ALL);

require '../vendor/autoload.php';

/**
 * Namespace
 * Controllers
 * @controllers @id:[0-9]{3}
 * @actions
 * @params
 * $route->params; $route->regex; $route->splat;
 */
Flight::route('/(@ns(/@ctrl(/@action(/@params:.*))))', function($ns, $ctrl, $action, $params){
        // Array of HTTP methods matched against
        $ns = $ns?ucfirst(strtolower(filter_var($ns,FILTER_SANITIZE_URL))):'';
        $c = $ctrl?ucfirst(strtolower(filter_var($ctrl,FILTER_SANITIZE_URL))).'Controller':'IndexController';
        $a = $action?strtolower(filter_var($action,FILTER_SANITIZE_URL)).'Action':'indexAction';
        $p = $params?explode('/',strtolower(filter_var($params,FILTER_SANITIZE_URL))):[];
        
        $class=$ns.'\\Controller\\'.$c;
        (new $class)->$a(...$p);
}, true);


Flight::start();

/*
url - The URL being requested
base - The parent subdirectory of the URL
method - The request method (GET, POST, PUT, DELETE)
referrer - The referrer URL
ip - IP address of the client
ajax - Whether the request is an AJAX request
scheme - The server protocol (http, https)
user_agent - Browser information
type - The content type
length - The content length
query - Query string parameters
data - Post data or JSON data
cookies - Cookie data
files - Uploaded files
secure - Whether the connection is secure
accept - HTTP accept parameters
proxy_ip - Proxy IP address of the client

Flight::map('hello', function($name){
    echo "hello $name!";
});
Flight::register('user', 'User');
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=test','user','pass'),
  function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
);
Flight::map('notFound', function(){
    // Display custom 404 page
    include 'errors/404.html';
});

Flight::before('hello', function(&$params, &$output){
    // Manipulate the parameter
    $params[0] = 'Fred';
});

Flight::set('id', 123);

// Elsewhere in your application
$id = Flight::get('id');

if( Flight::has('id') )

$id = Flight::request()->query['id'];
$id = Flight::request()->query->id;
$body = Flight::request()->getBody();
$id = Flight::request()->data->id;
 */
// $request = Flight::request();
// var_dump($request);

/*Flight::route('/news', function(){
    Flight::lastModified(1234567890);
    echo 'This content will be cached.';
});

ETag

ETag caching is similar to Last-Modified, except you can specify any id you want for the resource:

Flight::route('/news', function(){
    Flight::etag('my-unique-id');
    echo 'This content will be cached.';
});
*/
