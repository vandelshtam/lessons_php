<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if( !session_id() ) @session_start();

require '../vendor/autoload.php';

use \DI\ContainerBuilder;
$containerBuilder = new \DI\ContainerBuilder();
$container = $containerBuilder->build();



//nikic/fast-route!!!!!!!!!!!!!

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/home', ['App\controllers\HomeController','index']);
    //$r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/about={amount:\d+}', ['App\controllers\HomeController','about']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/about', ['App\controllers\HomeController','about']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/register', ['App\controllers\HomeController','register']);
    $r->addRoute('POST', '/php/lessons_php/module_2/code_League_Plates/public/index.php/register', ['App\controllers\HomeController','register']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/email_verification', ['App\controllers\HomeController','email_verification']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/login', ['App\controllers\HomeController','login']);
    $r->addRoute('POST', '/php/lessons_php/module_2/code_League_Plates/public/index.php/login', ['App\controllers\HomeController','login']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/logout', ['App\controllers\HomeController','logout']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/mail', ['App\controllers\HomeController','mail']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/insert', ['App\controllers\HomeController','insert']);
    $r->addRoute('GET', '/php/lessons_php/module_2/code_League_Plates/public/index.php/paginator', ['App\controllers\HomeController','paginator']);
    
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1],$routeInfo[2]);
        break;
}








