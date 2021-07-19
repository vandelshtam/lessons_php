<?php
include('/php/lessons_php/modul_1_project_validator/project_validator/model/validator.php');
if(isset($_POST['submit'])){
    //echo '<h3>form submitted</h3>';
    $validation = new userValidator($_POST);
    $errors = $validation->validateForm();
}
?>
<form method="POST" action="#">
    	<label for="username">Username:</label>
            <input type="text" name="username"><br>
            <div><?php echo $errors['username'] ?? '' ?></div>
        <label for="email">Email:</label>
            <input type="email" name="email"><br>
            <div><?php echo $errors['email'] ?? '' ?></div>
        <!--<label for="password">Password:</label>
            <input type="password" name="password"><br>-->
        <button type="submit" name="submit">Send</button>
    </form>
