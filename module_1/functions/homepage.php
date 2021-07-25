<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = include '/Applications/MAMP/htdocs/php/lessons_php/module_1/database/start.php';



$posts = $db->getAll('posts');

include '/Applications/MAMP/htdocs/php/lessons_php/module_1/index_view.php';