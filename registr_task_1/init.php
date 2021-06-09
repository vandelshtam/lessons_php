<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DOCROOT', $_SERVER['DOCUMENT_ROOT'].'<YOUR PROJECT DIRECTORY>/');
//$destino= DOCROOT.'Perf_Masc/'.$img; 

$pdo= new PDO("mysql:host=localhost:8889; dbname=lessons_php","root","root"); 
