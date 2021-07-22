<?php 

require('/Applications/MAMP/htdocs/php/lessons_php/module_1_project_validator/project_validator/model/validator.php');
  
  $errors = [];

  if(isset($_POST['submit'])){
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
  }
  require('/Applications/MAMP/htdocs/php/lessons_php/module_1_project_validator/project_validator/view/form_view.php');
?>
