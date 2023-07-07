<?php

spl_autoload_register(function($className){
 require $filename = "App/Models/".ucfirst($className).".php";
});


require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Controller.php';
require 'Model.php';
require 'Router.php';

$router = new Router();
$router->loadRouter();