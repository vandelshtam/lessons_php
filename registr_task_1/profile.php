<?php
session_start();
require 'function.php'; 
require 'init.php';

$user=get_user_by($_SESSION['profil_id'],$pdo); 
    
require 'page_profile.php';