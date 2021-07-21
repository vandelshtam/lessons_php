<?php
include __DIR__ .'/../function.php';

$route = $_SERVER['REQUEST_URI'];
$flash=strrchr($route, '=');

$routes = [
    "/php/lessons_php/module_1_project_flash/project_flash/success$flash" => "controller/flash_creator.php?success$flash",
    "/php/lessons_php/module_1_project_flash/project_flash/danger$flash" => "controller/flash_creator.php?danger$flash",
    "/php/lessons_php/module_1_project_flash/project_flash/info$flash" => "controller/flash_creator.php?info$flash"
];


if(array_key_exists($route, $routes))
{
    
    header('Location:/php/lessons_php/module_1_project_flash/project_flash/'.$routes[$route]);exit;
}
else
{
    dd(404);
}

