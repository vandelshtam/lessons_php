<?php
session_start();
require 'function.php'; 
require 'init.php';

$email_profil=$_GET['email'];//email пользователя чью страницу будем редактировать
$email_login=$_SESSION['login'];//email авторизованного пользователя который редактирует страницу
$user_profil=get_user_by_email($email_profil, $pdo);//запрашиваем данные пользователя по email_profil полученому в GET
$user_id=$user_profil['id'];

//проверяем авторизован пользователь, если нет отправляем на страницу авторизации
if(is_logged_in()==false)
{
    redirect_to('login'); die();
}
//проверяем является ли пользователь админом или владельцем редактируемой страницы
//если да то выполняем код дальше, если нет - переадресуем на страницу пользователей
//Я НЕ СМОГ РЕАЛИЗОВАТЬ РАБОТАЮЩЕЕ РЕШЕНИЕ!!!!!!!!!!!!!!! ПОЭТОМУ ОСТАВИЛ ЭТО ЗАКОЛММЕНТИРОВАННЫМ
/*
if($_GET['email']!=$_SESSION['login'] and is_admin_in($pdo,$_SESSION['login'])==false)
{
    set_flash_message('danger','You can only edit your profile!');
    redirect_to('users');die();
}
*/
   
if(isset($_POST['email']) and isset($_POST['password']) and isset($_POST['confirm']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $user=get_user_by_email($email, $pdo);
    var_dump($user['email']);
    //проверим есть  такая почта (логин) в БД  и отличается ли введенная новая почта той которая 
    //имеется в базе данных если она принадлежит пользователю/адимну которые изменяют данные своей страницы
    //в случае выполнения условий запишем новую почту в таблицу БД
        if($email_profil==$email or empty($user) )
        {
            edit_credentials($user_id,$email,$email_profil, $email_login, $password, $confirm, $pdo);   
        }
        else
        {
            set_flash_message('danger','Такой email (логин) занят, пожалуйста введите другой email!');
            redirect_to('security');die();
        }
    
}
else
{
     $email=$user_profil['email'];//если post запроса еще нет, запишем в форму емайл пользователя страницы которую предстоит редактировать
}




require 'page_security.php';