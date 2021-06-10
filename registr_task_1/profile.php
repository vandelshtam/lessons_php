<?php
session_start();
require 'function.php'; 
require 'init.php';

$email=$_SESSION['login'];

if(is_logged_in()==false)
{
    redirect_to('login');
}
    
    if(isset($_SESSION['profile_id'])){
        $user_id=$_SESSION['profile_id'];
        $user=get_user_by($user_id,$pdo); 
    }
    
require 'page_profile.php';