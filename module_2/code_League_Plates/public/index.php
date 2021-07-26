<!-- tamtamchick-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>
    <?php
// Start a Session
if( !session_id() ) @session_start();

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require '../vendor/autoload.php';

if(true){
    flash()->message('Hot!', 'error');
}
echo flash()->display();
?>
</body>



<?php
//require '../vendor/autoload.php';


//kint!!!!!!
//d([1,2,3]);

/*
//League/Plates!!!!!
$templates = new League\Plates\Engine('../app/views');
//var_dump($templates); die;
// Render a template
//echo $templates->render('homepage', ['name' => 'Jonathan']);
//echo $templates->render('about', ['title' => 'We work for you']);
echo $templates->render('contacts', ['phone' => 'Our contact phone number']);
*/







/*
//QueryBuilder!!!!
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
/*
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
*/
