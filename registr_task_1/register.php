<?php
session_start();
require 'init.php';
require 'function.php';

if(isset($_POST['email']) and isset($_POST['userpassword']))
{
$email=$_POST['email'];
$password = $_POST['userpassword'];

$user = get_user_by_email($email, $pdo);

if(!empty($user))
{
    $message='This address is already taken, please try another!';
    $auth=null;
    $class='alert-danger';
    set_flash_message($class,$auth,$message);
    redirect_to('register');die();   
}
else
{
    $password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    add_user($email,$password, $pdo);
    $message='You have successfully registered!';
    $auth=true;
    $class='alert-success';
    set_flash_message($class,$auth,$message);
    redirect_to('login');die();
}
}
require 'page_register.php';
?>
