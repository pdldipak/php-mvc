<?php 
include("Core/Router.php");
$router = new Router();

//echo 'Request URI: ' . $_SERVER['REQUEST_URI'].phpinfo();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';

?>