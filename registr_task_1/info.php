<?php 
//session_start();
//var_dump($_SESSION);
/*
    if(isset($_SESSION['message'])){
        $status=$_SESSION['message']['status'];
        $text=$_SESSION['message']['text'];
    echo "<p class=\"$status\">$text</p>";
    unset ($_SESSION['message']);
    }*/
    $pdo= new PDO("mysql:host=localhost:8889; dbname=lessons_php","root","root"); 
    function display_flash_message()
    { 
        if(isset($_SESSION['message'])){  
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        }
    }