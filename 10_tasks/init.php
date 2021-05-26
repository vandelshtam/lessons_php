<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost:8889'; 
$user = 'root'; 
$password = 'root'; 
$db_name = 'marlin'; 
$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");