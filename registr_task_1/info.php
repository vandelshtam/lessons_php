<?php 
$pdo= new PDO("mysql:host=localhost:8889; dbname=lessons_php","root","root"); 
function display_flash_message()
{ 
    if(isset($_SESSION['message']))
    {  
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}