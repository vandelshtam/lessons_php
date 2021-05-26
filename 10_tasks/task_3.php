<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$content = '';

$array=[['Main'], ['PHP', 'function']];
    $content .='<ol class="breadcrumb page-breadcrumb">';
    foreach($array as $key=>$elem)
    {
        $content .='<li class="breadcrumb-item"><a href="#">'.$elem[0].'</a></li>';                       
    }
    $content .='<li class="breadcrumb-item active">'.$array[1][1].'</li>';
    $content .='</ol>';      
include 'task_layout_3.php';

                            
  
