<?php
session_start();
require 'function.php'; 
require 'init.php';

$user_id=$_GET['users_id'];
$user=get_user_by($user_id,$pdo);
$online_status=$user[0]['online_status'];
$list_status=['online', 'walked away', 'do not disturb'];
if(isset($_POST['select_status']))
{
    $select_status=$_POST['select_status'];
    set_user_status($user_id, $pdo, $select_status);
    set_flash_message('success','Вы успешно изменили статус!');
    redirect_to('profile');die();
}

    
require 'page_status.php';