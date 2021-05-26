<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$content = '';

$array=[['src'=>'img/demo/authors/sunny.png', 'alt'=>'Sunny A.','name'=>'Sunny A. (UI/UX Expert)','occupation'=>'Lead Author','link_twit'=>'https://twitter.com/@myplaneticket', 'nik'=>'@myplaneticket', 'link'=>'https://wrapbootstrap.com/user/myorange','title'=>'Contact Sunny'],
['src'=>'img/demo/authors/josh.png', 'alt'=>'Jos K.','name'=>'Jos K. (ASP.NET Developer)','occupation'=>'Partner &amp; Contributor','link_twit'=>'https://twitter.com/@atlantez', 'nik'=>'@atlantez', 'link'=>'https://wrapbootstrap.com/user/Walapa','title'=>'Contact Jos'],
['src'=>'img/demo/authors/jovanni.png', 'alt'=>'Jovanni Lo','name'=>'Jovanni L. (PHP Developer)','occupation'=>'Lead Author','link_twit'=>'https://twitter.com/@lodev09', 'nik'=>'@lodev09', 'link'=>'https://wrapbootstrap.com/user/lodev09','title'=>'Contact Jovanni'],
['src'=>'img/demo/authors/roberto.png', 'alt'=>'Roberto R.','name'=>'Roberto R. (Rails Developer)','occupation'=>'Partner &amp; Contributor','link_twit'=>'https://twitter.com/@sildur', 'nik'=>'@sildur', 'link'=>'https://wrapbootstrap.com/user/sildur','title'=>'Contact Roberto']];
    
    foreach($array as $key=>$elem)
    {
        $content .='<div class="rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">';
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

    

    ?>     
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                           <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                            
                            
                            
                            <?= $content;?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
