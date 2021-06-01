<?php
function get_user_by_email($email, $pdo)
{
    $sql="SELECT * FROM  users WHERE email=:email";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user=$statement->fetch(PDO::FETCH_ASSOC);
    //var_dump($user);
    return $user; 
}
function add_user($email,$password, $pdo)
{
    
    $sql="INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password]);

    $sql="SELECT * FROM users WHERE email=:email";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user_add=$statement->fetch(PDO::FETCH_ASSOC);
    return $user_add;
}
function set_flash_message($class, $auth, $message)
{ 
    
        $_SESSION['class']=$class; 
        $_SESSION['auth']=$auth;
        $_SESSION['message'] = $message;  
    
}
function redirect_to($file)
{  
    if($file==true)
    {
        header('Location:/php/lessons_php/registr_task_1/page_login.php');
    }
    else
    {
        header('Location:/php/lessons_php/registr_task_1/register.php');
    }        
}
