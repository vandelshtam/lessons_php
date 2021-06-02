<?php
session_start();
require 'info.php';
require 'init.php';
require 'function.php';

if(isset($_POST['email']) and isset($_POST['userpassword']))
{
$email=$_POST['email'];
$password = $_POST['userpassword'];

$user = get_user_by_email($email, $pdo);

if(!empty($user))
{
    set_flash_message('danger');
    redirect_to('register');die();   
}
else
{
    $password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    add_user($email,$password, $pdo);
    set_flash_message('success');
    redirect_to('login');die();
}
}
require 'page_register.php';
?>
