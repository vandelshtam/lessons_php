<?php
session_start();
require 'function.php'; 
require 'init.php';

$user_id=$_GET['users_id'];
$user=get_user_by($user_id,$pdo);
$avatar=$user[0]['avatar'];
var_dump($avatar);
var_dump($_FILES);
if(isset($_POST['send']))
{
    $direct='/Applications/MAMP/htdocs/php/lessons_php/registr_task_1/img/demo/avatars/';//у меня работает только абсолютный адрес
    $image_name=$_FILES['avatar']['name'];
    $image_name_tmp=$_FILES['avatar']['tmp_name'];
    $new_avatar='img/demo/avatars/'.$image_name;
    set_file_image($image_name_tmp, $image_name, $direct);
    update_avatar($user_id, $pdo, $new_avatar);
    set_flash_message('success','Вы успешно изменили аватар!');
    //redirect_to('profile');die();

}


    
require 'page_media.php';