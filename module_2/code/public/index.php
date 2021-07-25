<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

/*
$routes = [
    "/php/lessons_php/module_2/code/home" => 'controllers/homepage.php'
];

$route = $_SERVER['REQUEST_URI'];

var_dump($route);



if(array_key_exists($route, $routes))
{
    
    echo 'Hello'; 
    require '../app/'.$routes[$route];exit;
}
else{
    echo 'ERROR';
}
exit;
*/

$route = $_SERVER['REQUEST_URI'];

//var_dump($route);
if($_SERVER['REQUEST_URI'] == '/php/lessons_php/module_2/code/home')
{
    //echo 'Hello'; 
    require '../app/controllers/homepage.php';
}
else{
    echo 'ERROR';
}

exit;

