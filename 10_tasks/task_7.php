<?php
include 'init.php';
$content = '';
$query = "SELECT * FROM  task_7";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    foreach($data as $elem)
    {
        $content .='<div class="rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0"  style="opacity:'.$elem['banned'].';">';
        $content .='<img src="'.$elem['src'].'" alt="'.$elem['alt'].'" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">';
        $content .='<div class="ml-2 mr-3">';
        $content .='<h5 class="m-0">';
        $content .=$elem['name'];
        $content .='<small class="m-0 fw-300">';
        $content .=$elem['occupation'];
        $content .='</small>';
        $content .='</h5>';
        $content .='<a href="'.$elem['link_twit'].'" class="text-info fs-sm" target="_blank">'.$elem['nik'].'</a> -';
        $content .='<a href="'.$elem['link'].'" class="text-info fs-sm" target="_blank" title="'.$elem['title'].'"><i class="fal fa-envelope"></i></a>';
        $content .='</div>';
        $content .='</div>';
    } 
include 'task_layout_7.php';       
