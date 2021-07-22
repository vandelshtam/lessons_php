<?php
$routes = [
    "/php/lessons_php/module_1_project_validator/project_validator/validator.get" => 'controller/form_processing.php'
];

$route = $_SERVER['REQUEST_URI'];

if(array_key_exists($route, $routes))
{
    
    include '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_validator/project_validator/'.$routes[$route];exit;
}
else
{
    dd(404);
}

