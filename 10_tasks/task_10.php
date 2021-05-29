<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$pdo= new PDO("mysql:host=localhost:8889; dbname=lessons_php","root","root");
if(isset($_POST['text']))
{
        if($_POST['text']!='')
        {
            $text=$_POST['text'];
            $sql="SELECT * FROM  task_9 WHERE text=:text";
            $statement=$pdo->prepare($sql);
            $statement->execute(['text' => $text]);
            $data=$statement->fetch(PDO::FETCH_ASSOC);
            //var_dump($data);
            if($data==true)
                {
                    $_SESSION['message'] = [
                                            'texts'=>'You should check in on some of those fields below.!!!',
                                            'status'=>'alert-danger'
                                            ];
                }
                else
                {   
                    $sql="INSERT INTO task_9 (text) VALUES (:text)";
                    $statement=$pdo->prepare($sql);
                    $statement->execute(['text' => $text]);
                    $_SESSION['message'] =  [
                                            'texts'=>"you have successfully dubbed the entry",
                                            'status'=>'alert-success'
                                            ];
                    header('location:/php/lessons_php/10_tasks/task_10.php'); die(); 
                } 

        }

        if($_POST['text']==''):
        
            $text=''; 
            $_SESSION['message'] = [
                                    'texts'=>'You have sent a blank form, please fill out the form',
                                    'status'=>'alert-info'
                                    ];   
        endif;
}
else
{
    $text=''; 
    $_SESSION['message'] = [
                            'texts'=>'Please fill out the form',
                            'status'=>'alert-success'
                            ];   
}

if(isset($_SESSION['message'])):
    $status=$_SESSION['message']['status'];
    $texts=$_SESSION['message']['texts'];
    //echo "<p class=\"$status\">$texts</p>";
    unset($_SESSION['message']);
endif;
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
                            <div class="panel-content">
                                <div class="form-group">
                                    <div class="alert <?= $status;?> fade show" role="alert">
                                    <?= $texts;?>
                                    </div>
                                        <form action="/php/lessons_php/10_tasks/task_10.php" method="POST">
                                            <label class="form-label" for="simpleinput">you entered: <?=$text;?></label>
                                            <input type="text" id="simpleinput" class="form-control" name="text">
                                            <button class="btn btn-success mt-3" type="submit">Submit</button>
                                        </form>
                                </div>
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
