<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$data=[
['title'=>'My Tasks', 'value'=>'130/500','style'=>'bg-fusion-400', 'class_mt_2'=>'mt-2', 'class_progress'=>'mb-3','width_tags'=>'width: 65%;','valuenow'=>'65', 'valuemin'=>'0', 'valuemax'=>'100'],
['title'=>'Transferend', 'value'=>'440 TV','style'=>'bg-success-500', 'class_mt_2'=>'', 'class_progress'=>'mb-3','width_tags'=>'width: 34%;','valuenow'=>'34', 'valuemin'=>'0', 'valuemax'=>'100'],
['title'=>'Bugs Squashed', 'value'=>'77%','style'=>'bg-info-400', 'class_mt_2'=>'', 'class_progress'=>'mb-3','width_tags'=>'width: 77%;','valuenow'=>'77', 'valuemin'=>'0', 'valuemax'=>'100'],
['title'=>'User Testing', 'value'=>'7 Days','style'=>'bg-primary-300', 'class_mt_2'=>'', 'class_progress'=>'mb-g','width_tags'=>'width: 84%;','valuenow'=>'84', 'valuemin'=>'0', 'valuemax'=>'100']];
$content ='';
    foreach($data as $elem)
    {
        $content .= '<div class="d-flex '.$elem['class_mt_2'].'">';
        $content .= $elem['title'];
        $content .='<span class="d-inline-block ml-auto">'.$elem['value'].'</span>';
        $content .='</div>';
        $content .='<div class="progress progress-sm '.$elem['class_progress'].'">';
        $content .='<div class="progress-bar '.$elem['style'].'" role="progressbar" style="'.$elem['width_tags'].'" aria-valuenow="'.$elem['valuenow'].'" aria-valuemin="'.$elem['valuemin'].'" aria-valuemax="'.$elem['valuemax'].'"></div>'; 
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
                            <?= $content;?>
                            
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
