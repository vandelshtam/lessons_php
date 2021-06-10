<?php
session_start();
require 'init.php';
require 'function.php';
if(isset($_POST['email']) and isset($_POST['password'])){
    $password=$_POST['password'];
    $email=$_POST['email'];
    $a=login($email,$password,$pdo);
    var_dump($a['id']);
    if(login($email,$password,$pdo)==true)
    { 
        $user=get_user_by_email($email, $pdo);
        $_SESSION['user_id']=$user['id']; 
        redirect_to('users');die();
    } 
    if(login($email,$password,$pdo)==false)
    { 
        redirect_to('login');die();
    }    
}
require 'page_login.php';