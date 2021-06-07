<?php
session_start();
require 'function.php'; 
require 'init.php';

if(is_logged_in()==false)
{
    redirect_to('login');
}
$email=$_SESSION['login'];
is_admin_in($pdo,$email);
$user=get_user($pdo);
require 'page_users.php';
//