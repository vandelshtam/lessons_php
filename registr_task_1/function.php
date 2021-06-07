<?php
function get_user_by_email($email, $pdo)
{
    $sql="SELECT * FROM  users WHERE email=:email";
    //$sql="SELECT user.id as user_id_id, user.email as user_email, user.password as user_password, general_information.user_id as general_information_user_id, general_information.name as general_information_name FROM users INNER JOIN general_information user.id=general_information.user_id";
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


function set_session_auth($id,$email)
{    
    $_SESSION['id']=$id; 
    //$_SESSION['user_id']=$user_id; 
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
    $sql="SELECT users.id as users_id, users.email as users_email, users.password as users_password, general_information.id as general_information_id, 
    general_information.user_id as general_information_user_id, general_information.name as general_information_name, general_information.phone as general_information_phone,
    general_information.occupation as general_information_occupation, general_information.location as general_information_location, media.online_status as media_online_status, media.avatar as media_avatar,
    social_networks.vk as social_networks_vk, social_networks.telegram as social_networks_telegram, social_networks.instagram as social_networks_instagram FROM users 
    INNER JOIN general_information ON general_information.user_id=users.id 
    INNER JOIN media ON media.user_id=general_information.user_id
    INNER JOIN social_networks ON social_networks.user_id=media.user_id ";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $user; 
}

function edit($user_id,$name,$occupation,$phone, $location, $pdo)
{
    $sql="SELECT * FROM  general_information WHERE user_id=:user_id";
    $statement=$pdo->prepare($sql);
    $statement->execute(['user_id' => $user_id]);
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    if(empty($user))
    {
        $sql_id="INSERT INTO general_information (user_id, occupation,  phone, location, name) VALUES (:user_id, :occupation, :phone, :location, :name)";
        $statement_id=$pdo->prepare($sql_id);
        $statement_id->execute(['user_id'=>$user_id,  'occupation'=>$occupation, 'phone'=>$phone, 'location'=>$location, 'name'=>$name]);
    }
    else
    {
        $sql_id="UPDATE general_information SET  occupation=:occupation,  phone=:phone, location=:location, name=:name WHERE user_id='$user_id'";
        $statement_id=$pdo->prepare($sql_id);
        $statement_id->execute(['occupation'=>$occupation, 'phone'=>$phone, 'location'=>$location, 'name'=>$name]);
    }   
    return true;
}

function set_user_status($user_id, $pdo, $online_status)
{
    $sql="SELECT * FROM  media WHERE user_id=:user_id";
    $statement=$pdo->prepare($sql);
    $statement->execute(['user_id' => $user_id]);
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    if(empty($user))
    {
        $sql_status="INSERT INTO media (user_id, online_status) VALUES (:user_id, :online_status)";
        $statement_status=$pdo->prepare($sql_status);
        $statement_status->execute(['user_id'=>$user_id,  'online_status'=>$online_status]);
    }
    else
    {
        $sql_status="UPDATE media SET  online_status=:online_status WHERE user_id='$user_id'";
        $statement_status=$pdo->prepare($sql_status);
        $statement_status->execute(['online_status'=>$online_status]);
    }   
}

function update_avatar($user_id, $pdo, $avatar)
{
    $sql="SELECT * FROM  media WHERE user_id=:user_id";
    $statement=$pdo->prepare($sql);
    $statement->execute(['user_id' => $user_id]);
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    if(empty($user))
    {
        $sql="INSERT INTO media (user_id, avatar) VALUES (:user_id, :avatar)";
        $statement=$pdo->prepare($sql);
        $statement->execute(['user_id'=>$user_id,  'avatar'=>$avatar]);
    }
    else
    {
        $sql="UPDATE media SET  avatar=:avatar WHERE user_id='$user_id'";
        $statement=$pdo->prepare($sql);
        $statement->execute(['avatar'=>$avatar]);
    }   
}

function update_social($user_id,$vk,$telegram, $instagram, $pdo)
{
    $sql="SELECT * FROM  social_networks WHERE user_id=:user_id";
    $statement=$pdo->prepare($sql);
    $statement->execute(['user_id' => $user_id]);
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    if(empty($user))
    {
        $sql="INSERT INTO social_networks (user_id, vk, telegram, instagram) VALUES (:user_id, :vk, :telegram, :instagram)";
        $statement=$pdo->prepare($sql);
        $statement->execute(['user_id'=>$user_id,  'vk'=>$vk, 'telegram'=>$telegram, 'instagram'=>$instagram]);
    }
    else
    {
        $sql="UPDATE social_networks SET  vk=:vk,  telegram=:telegram, instagram=:instagram WHERE user_id='$user_id'";
        $statement=$pdo->prepare($sql);
        $statement->execute(['vk'=>$vk, 'telegram'=>$telegram, 'instagram'=>$instagram]);
    }   
    return true;
}