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
    set_flash_message('danger',$message);
    redirect_to('register');die();   
}
else
{
    $password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    add_user($email,$password, $pdo);
    $message='You have successfully registered!';
    set_flash_message('success',$message);
    redirect_to('login');die();
}
}
require 'page_register.php';
?>
