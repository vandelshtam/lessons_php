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

function set_flash_message($sess_key,$message)
{ 
    if('success')
    {
        $_SESSION['class']='alert-success'; 
        $_SESSION['auth']=true;
        $_SESSION['message'] = $message;
    }
    if('danger')
    {
        $_SESSION['class']='alert-danger'; 
        $_SESSION['auth']=null;
        $_SESSION['message'] = $message;
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
            //$id=mysqli_insert_id($sql);
            set_session_auth($id,$email);
            $message='You are successfully logged in as '.$_SESSION['login'].'!';
            set_flash_message('success',$message);
            return true;
        }
        else
        {
            $message='Пароль не верный!';
            set_flash_message('danger',$message);
            return false;
        }
    }
    else
    {
        $message='Такого логина нет!';
        set_flash_message('danger',$message);
        return false;
    }
}

function display_flash_message($sess)
{ 
    if(isset($_SESSION[$sess]))
    {  
        echo $_SESSION[$sess];
        unset($_SESSION[$sess]);
    }
}
