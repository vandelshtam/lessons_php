<?php
session_start();
require 'function.php'; 
require 'init.php';

$email=$_SESSION['login'];
if(is_logged_in()==false or is_admin_in($pdo,$email)==false)
{
    redirect_to('login');
}

if(isset($_POST['email']) and isset($_POST['password']))
{

$email=$_POST['email'];
$password = $_POST['password'];
$user = get_user_by_email($email, $pdo);

    if(!empty($user))
    {
        set_flash_message('danger','This address is already taken, please try another!');
        redirect_to('add_users'); die();  
    }
    else
    {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_id=add_user($email,$password, $pdo);
    var_dump($user_id);

        if(isset($_POST['name']) or isset($_POST['occupation']) or isset($_POST['phone']) or isset($_POST['location']))
        {
            $name=$_POST['name'];
            var_dump($name);
            $occupation=$_POST['occupation'];
            $phone=$_POST['phone'];
            $location=$_POST['location'];
            edit($user_id,$name,$occupation,$phone, $location, $pdo);
        }
        if(isset($_POST['online_status']))
        {
            $online_status=$_POST['online_status'];
            set_user_status($user_id, $pdo, $online_status);
        }
        if(isset($_POST['avatar']))
        {
            $avatar=$_POST['avatar'];
            update_avatar($user_id, $pdo, $avatar);
        }
        if(isset($_POST['vk']) or isset($_POST['telegram']) or isset($_POST['instagram']))
        {
            $vk=$_POST['vk'];
            $telegram=$_POST['telegram'];
            $instagram=$_POST['instagram'];
            update_social($user_id, $vk, $telegram, $instagram,$pdo);
        }
        
    set_flash_message('success','You have successfully add!');
    redirect_to('users');die();
    }
}
require 'create_user.php';