<?php
session_start();
require 'function.php'; 
require 'init.php';

if(isset($_GET['users_id']))
{
    delete($_GET['users_id'],$pdo);
    
    if(isset($_SESSION['user_id'])==$_GET['users_id'])
    {
        logout();
    }
    else
    {
        set_flash_message('success','Вы успешно удалили пользователя');
        redirect_to('profile');die();
    }
    
}
