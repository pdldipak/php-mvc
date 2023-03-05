<?php 
include("vendor/autoload.php");
ob_start(); //Turns on output buffering 
session_start();

$timezone = date_default_timezone_set("Europe/Stockholm");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); //Notice the Namespace and Class name
$dotenv->load();
require("public/index.php");
?>