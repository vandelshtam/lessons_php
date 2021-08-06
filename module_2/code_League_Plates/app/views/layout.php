<?php
if(true){
    flash()->message('We Hello!', 'success');
}
echo flash()->display();
?>
<html lang="en">
  <head>
  <!doctype html>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  
    <title><?=$this->e($title)?></title>
  </head>
  <body>
      <nav>
          <ul>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/home">homepage</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/about?vars=1">about</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/contacts">contacts</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/register">register</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/login">login</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/logout">logout</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/insert">insert</a></li>
              <li><a href="/php/lessons_php/module_2/code_League_Plates/public/index.php/paginator">paginator</a></li>
          </ul>
      </nav>
    
  

<?=$this->section('content')?>
</body>
</html>