<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = include '/Applications/MAMP/htdocs/php/lessons_php/module_2/autoload/database/start.php';

//require '/Applications/MAMP/htdocs/php/lessons_php/module_2/functions/Classes/class1.php';
//require '/Applications/MAMP/htdocs/php/lessons_php/module_2/functions/Classes/class2.php';



spl_autoload_register(function($class)
{
    
    //var_dump($class);die;
    require 'Classes/'.$class.'.php';
    //include 'Classes/'.$class.'.class.php';
});


$class1 = new Class1();
$class2 = new Class2();

exit;


$posts = $db->getAll('posts');

include '/Applications/MAMP/htdocs/php/lessons_php/module_2/autoload/index_view.php';