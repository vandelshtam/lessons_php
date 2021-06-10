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
    $user_id=$pdo->lastInsertId();
    return $user_id;
}

function set_flash_message($name,$message)
{    
    $_SESSION[$name]=$message;     
}


function set_session_auth($user_id,$email)
{    

    $_SESSION['user_id']=$user_id; 
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
    if($file=='add_users')
    {
        header('Location:/php/lessons_php/registr_task_1/add_users.php');
    }
    if($file=='profile')
    {
        header('Location:/php/lessons_php/registr_task_1/profile.php');
    }                         
}

function login($email,$password,$pdo)
{  
    $sql="SELECT * FROM  users WHERE email=:email";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    $user_id=$pdo->lastInsertId();
    
    
    if(!empty($user))
    {
        $hash = $user[0]['password'];
        if(password_verify($password, $hash))
        {    
            
            set_session_auth($user_id, $email);
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
    $sql="SELECT * FROM users ";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $user; 
}
function get_user_by($user_id,$pdo)
{
    $sql="SELECT * FROM users WHERE id='$user_id'";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $user; 
}

function edit_information($user_id,$name,$occupation,$phone, $location, $pdo)
{
    $sql_id="UPDATE users SET name=:name, location=:location, phone=:phone, occupation=:occupation  WHERE id='$user_id'";
    $statement_id=$pdo->prepare($sql_id);
    $statement_id->execute(['name'=>$name, 'location'=>$location, 'phone'=>$phone, 'occupation'=>$occupation,]);  
    return true;
}



function set_user_status($user_id, $pdo, $online_status)
{
    
    $sql_status="UPDATE users SET  online_status=:online_status WHERE id='$user_id'";
    $statement_status=$pdo->prepare($sql_status);
    $statement_status->execute(['online_status'=>$online_status]);
      
}


function update_avatar($user_id, $pdo, $avatar)
{
    $sql="UPDATE users SET  avatar=:avatar WHERE id='$user_id'";
    $statement=$pdo->prepare($sql);
    $statement->execute(['avatar'=>$avatar]);
    set_flash_message('success','File edit successfully');  
}
function delete_avatar($user_id, $pdo, $avatar)
{
    $avatar=null;
    $sql="UPDATE users SET  avatar=:avatar WHERE id='$user_id'";
    $statement=$pdo->prepare($sql);
    $statement->execute(['avatar'=>$avatar]);
    set_flash_message('success','File edit successfully');  
}

function update_social($user_id,$vk,$telegram, $instagram, $pdo)
{
    $sql="UPDATE users SET  vk=:vk,  telegram=:telegram, instagram=:instagram WHERE id='$user_id'";
    $statement=$pdo->prepare($sql);
    $statement->execute(['vk'=>$vk, 'telegram'=>$telegram, 'instagram'=>$instagram]); 
    return true;
}

function set_file_image($image_name_tmp, $image_name, $direct)
{
    if (is_uploaded_file($image_name_tmp))
    {
            if (move_uploaded_file($image_name_tmp, $direct.$image_name )) {
                
                set_flash_message('success','File uploaded successfully');
            } else
            {
                set_flash_message('danger','File failed to load');
                redirect_to('add_users');
            }
    } else
    {
        set_flash_message('danger','File failed to load');
        redirect_to('add_users');
    }
}
