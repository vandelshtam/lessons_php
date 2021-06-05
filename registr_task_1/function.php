<?php
function get_user_by_email($email, $pdo)
{
    $sql="SELECT * FROM  users WHERE email=:email";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user=$statement->fetch(PDO::FETCH_ASSOC);
    return $user; 
}

function add_user($email,$password, $pdo)
{
    $user='user';
    $sql="INSERT INTO users (email, password, status) VALUES (:email, :password, :user)";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email'=>$email, 'password'=>$password, 'user'=>$user]);
    $id=$pdo->lastInsertId();
    return $id;
}

function set_flash_message($name,$message)
{    
    $_SESSION[$name]=$message;     
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
    
    
    if(!empty($user))
    {
        $hash = $user[0]['password'];
        if(password_verify($password, $hash))
        {    
            $id=$pdo->lastInsertId();
            set_session_auth($id,$email);
            set_flash_message('success','You are successfully logged in as '.$_SESSION['login'].'!');
            return true;
        }
        else
        {   
            set_flash_message('danger','Пароль не верный!');
            return false;
        }
    }
    else
    {   
        set_flash_message('danger','Такого логина нет!');
        return false;
    }
}

function display_flash_message($name)
{    
    echo $_SESSION[$name];
    unset($_SESSION[$name]);    
}

function is_logged_in()
{
    if(isset($_SESSION['auth'])==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function is_admin_in($pdo,$email)
{
    $email=$_SESSION['login'];
    $user=get_user_by_email($email, $pdo);
    if($user['status']=='admin')
    {
        set_flash_message('status','admin');
        return true;
    }
    else{
        set_flash_message('status','user');
        return false;
    }    
}

function get_user($pdo)
{
    $sql="SELECT * FROM  users";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $user; 
}
