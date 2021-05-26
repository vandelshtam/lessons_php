<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$content = '';
$array=['Report','Analytics','Export','Storage'];
    foreach($array as $elem)
    {
        $content .= '<ul id="js-list-msg" class="list-group px-2 pb-2 js-list-filter">';
            $content .= '<li class="list-group-item">';
                $content .= '<span data-filter-tags="reports file">'.$elem.'</span>';
            $content .= '</li>';                               
        $content .= '</ul>';
    }
include 'task_layout_1.php';
