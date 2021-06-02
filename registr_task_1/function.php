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
    $id=$pdo->lastInsertId($sql);var_dump($id);
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
    if($session=='auth')
    {
        $_SESSION['class']='alert-success'; 
        $_SESSION['auth']=true;
        $_SESSION['message'] = 'You are successfully logged in as '.$_SESSION['login'].'!';

    } 
    if($session=='no_password')
    {
        $_SESSION['class']='alert-danger'; 
        $_SESSION['auth']=null;
        $_SESSION['message'] = 'Пароль не верный!';
    } 
    if($session=='no_login')
    {
        $_SESSION['class']='alert-danger'; 
        $_SESSION['auth']=null;
        $_SESSION['message'] = 'Такого логина нет!';
    } 
}
function set_session_auth($id,$email)
{ 
    
        $_SESSION['id']=$id; 
        $_SESSION['login']=$email;
        $_SESSION['auth']=true;
    
}
function redirect_to($file)
{  
    if($file=='login')
    {
        header('Location:/php/lessons_php/registr_task_1/login.php');
    }
    if($file=='register')
    {
        header('Location:/php/lessons_php/registr_task_1/register.php');
    } 
    if($file=='users')
    {
        header('Location:/php/lessons_php/registr_task_1/users.php');
    }        
}
function login($email,$password,$pdo)
{
    
    $sql="SELECT * FROM  users WHERE email=:email";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($user);
    
    if(!empty($user))
    {
        $hash = $user[0]['password'];
        if(password_verify($password, $hash))
        {    
            $id=$pdo->lastInsertId($sql);
            set_session_auth($id,$email);
            set_flash_message('auth');
            return true;
        }
        else
        {
            set_flash_message('no_password'); 
            return false;
        }
    }
    else
    {
        set_flash_message('no_login'); 
        return false;
    }
}
