<?php
session_start();
require '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_flash/project_flash/function.php'; 
require '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_flash/project_flash/model/session_builder.php';

  if(isset($_GET)){
    foreach($_GET as $key=>$am); 
     
    $flash = new flashMessage();
    $flashMessage =$flash->addFlash($key, $_GET[$key]);
    
  }

require '/Applications/MAMP/htdocs/php/lessons_php/module_1_project_flash/project_flash/view/flash_view.php';