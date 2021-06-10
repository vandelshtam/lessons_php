<?php
session_start();
require 'function.php'; 
require 'init.php';

$email=$_SESSION['login'];

if(is_logged_in()==false)
{
    redirect_to('login');
}


    $user_id=$_GET['users_id'];
    $_SESSION['profile_id']=$user_id;
    $user=get_user_by($user_id,$pdo); 
    set_flash_message('id', ''.$users_id.'');
    if(isset($_POST['name']) or isset($_POST['occupation'])  or  isset($_POST['phone']) or isset($_POST['location'])){
        $name=$_POST['name'];
        var_dump($name);
        $occupation=$_POST['occupation'];
        $phone=$_POST['phone'];
        $location=$_POST['location'];
        edit_information($user_id,$name,$occupation,$phone, $location, $pdo);
        set_flash_message('success','Information edited successfully!');
        redirect_to('profile'); die();  
    }
    else
    {
        $name=$user[0]['name'];
        $occupation=$user[0]['occupation'];
        $phone=$user[0]['phone'];
        $location=$user[0]['location'];
    }
require 'page_edit.php';

