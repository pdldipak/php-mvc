<?php 
include("vendor/autoload.php");
ob_start(); //Turns on output buffering 
require_once("core/session.php");

$timezone = date_default_timezone_set("Europe/Stockholm");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); //Notice the Namespace and Class name
$dotenv->load();
require("public/index.php");
// require ("Core/init.php");