<?php
session_start();
require 'function.php'; 
require 'init.php';
$_SESSION['danger']=null;
if(is_logged_in()==false)
{
    redirect_to('login'); die();
}

if(isset($_GET['users_id']))
{
$user_auth=$_SESSION['user_id'];
$user_auth_profil=get_user_by($user_auth,$pdo);
$user_auth_password=$user_auth_profil[0]['password'];
$user_auth_email=$user_auth_profil[0]['email'];


    $user_id=$_GET['users_id'];
    $user_profil=get_user_by($user_id,$pdo);
    $profil_id=$user_profil[0]['id'];
    $profil_email=$user_profil[0]['email'];

    var_dump($user_profil);


        if(isset($_POST['email']) and isset($_POST['password']) and isset($_POST['confirm']))
        {
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confirm=$_POST['confirm'];

            $user=get_user_by_email($email, $pdo);
    
        if($email==$user_auth_email or empty($user) )
        {
            
            if($password==$confirm)
            {
                
                $hash = $user_auth_password; 
        
                if(password_verify($password, $hash))
                {
                    edit_credentials($user_id,$email,$profil_email, $user_auth_email, $pdo);
                }
                else
                {
                    set_flash_message('danger','Пароль не верный!');
                    //redirect_to('security');die();
                }
             
            }
            else
            {
                set_flash_message('danger','Пароль и подтверждение не совпадают!');
                //redirect_to('security');die();
                        
            }   
        }
        else
        {
            set_flash_message('danger','Такой email (логин) занят, пожалуйста введите другой email!');
            //redirect_to('security');die();
        }
        }
        else
        {
            set_flash_message('success','Вы можете изменить данные');
            $email=$profil_email;
        }
}

require 'page_security.php';