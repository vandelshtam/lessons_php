<?php
session_start();
require 'init.php';
require 'function.php';
if(isset($_POST['email']) and isset($_POST['password'])){
    $password=$_POST['password'];
    $email=$_POST['email'];
    
    if(login($email,$password,$pdo)==true)
    { 
       redirect_to('users');die();
    } 
    if(login($email,$password,$pdo)==false)
    { 
        redirect_to('login');die();
    }    
}
require 'page_login.php';