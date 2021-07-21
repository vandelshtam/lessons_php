<?php
include __DIR__ .'/../function.php';

$routes = [
    "/php/lessons_php/module_1_project_router/project_router/homepage.get" => 'controller/homepage.php',
    "/php/lessons_php/module_1_project_router/project_router/about.get" => 'controller/about.php',
    "/php/lessons_php/module_1_project_router/project_router/contacts.get" => 'controller/contacts.php'
];

$route = $_SERVER['REQUEST_URI'];
echo strrchr($route, '/');
dd($route);
if(array_key_exists($route, $routes))
{
    
    include '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_router/project_router/'.$routes[$route];exit;
}
else
{
    dd(404);
}

