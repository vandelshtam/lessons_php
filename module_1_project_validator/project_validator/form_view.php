<?php 

  require('/Applications/MAMP/htdocs/php/lessons_php/module_1_project_validator/project_validator/controller/validator.php');
  
  $errors = [];

  if(isset($_POST['submit'])){
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
  }

?>

<html lang="en">
<head>
  <title>validator</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  
  <div class="new-user">
    <h2>Create a new user</h2>
    <form action="" method="POST">

      <label>username: </label>
      <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
      <div class="error">
        <?php echo $errors['username'] ?? '' ?>
      </div>
      <label>email: </label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?>">
      <div class="error">
        <?php echo $errors['email'] ?? '' ?>
      </div>
      <label>password: </label>
      <input type="text" name="password" value="<?php echo htmlspecialchars($_POST['password']) ?? '' ?>">
      <div class="error">
        <?php echo $errors['password'] ?? '' ?>
      </div>
      <input type="submit" value="submit" name="submit" >

    </form>
  </div>

</body>



</html>
