<?php
include __DIR__ .'/../function.php';

$routes = [
    "/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/All_users.get" => 'controller/list_of_all_users.php'
];

$route = $_SERVER['REQUEST_URI'];

if(array_key_exists($route, $routes))
{
    
    include '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/'.$routes[$route];exit;
}
else
{
    dd(404);
}

