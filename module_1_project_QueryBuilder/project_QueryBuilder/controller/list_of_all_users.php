<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = include '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/QueryBuilder/start.php';
$posts = $db->getAll('posts');

include '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/index_view.php';