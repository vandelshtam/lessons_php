<?php
session_start();
require 'function.php'; 
require 'init.php';

if($_GET['users_id']!=false or $_GET['users_id']!=NULL){
    $_SESSION['profil_id']=$_GET['users_id'];  
}
if(isset($_POST['email']) and isset($_POST['password']))
{
    $email=$_POST['email'];
    $user=get_user_by_email($email, $pdo);
    
    if($email==$_SESSION['login'] or empty($user) )
    {
                    
        edit_credentials($_SESSION['profil_id'],$email, $pdo);   
        set_flash_message('success','Вы успешно изменили данные!');
        redirect_to('profile');die();
                    
    }
    else
    {
        set_flash_message('danger','Такой email (логин) занят, пожалуйста введите другой email!');
        redirect_to('security');die();
    }
}
require 'page_security.php';