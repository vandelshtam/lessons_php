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
    $statement=$pdo->lastInsertId($sql);
    return $user_add;
}
function set_flash_message($session)
{ 
    if($session=='danger')
    {
        $_SESSION['class']='alert-danger'; 
        $_SESSION['auth']=null;
        $_SESSION['message'] = 'This address is already taken, please try another!';  
    }
    if($session=='success')
    {
        $_SESSION['class']='alert-success'; 
        $_SESSION['auth']=true;
        $_SESSION['message'] = 'You have successfully registered!';  
    } 
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
