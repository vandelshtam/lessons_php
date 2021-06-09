<?php
session_start();
require 'function.php'; 
require 'init.php';

$email=$_SESSION['login'];

if(is_logged_in()==false)
{
    redirect_to('login');
}

if(is_admin_in($pdo,$email)==true or $_SESSION['id']!=$_GET['user_id'])
{
    $user_id=$_GET['users_id'];
    $user=get_user_by($user_id,$pdo); 
    if(isset($_POST['general_information_name']) or isset($_POST['preview'])  or  isset($_POST['url']) or isset($_POST['location']) or isset($_POST['article'])){
        $name=$_POST['general_information_name'];
        $occupation=$_POST['general_information_occupation'];
        $phone=$_POST['general_information_phone'];
        $location=$_POST['general_information_location'];

    }
    else{
        $name=$user['general_information_name'];
        $occupation=$user['general_information_occupation'];
        $phone=$user['general_information_phone'];
        $location=$user['general_information_location'];
    }
    edit_information($user_id,$name,$occupation,$phone, $location, $pdo);
    set_flash_message('success','Information edited successfully!');
    redirect_to('users'); die();  
}
else
{
    redirect_to('users');
}
require 'page_edit.php';