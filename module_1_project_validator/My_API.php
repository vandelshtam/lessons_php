<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=7">
    <title><?= $title;?></title>
</head>
<body>
  <!-- верхняя панель навигации-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My API component</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    </div>
  </div>
</nav>
  </div>
<heder>
  <div style="margin-top:50px; margin-bottom:0px;">
  <!--подключаем файл с сессией выводящей различную информацию о результатах действий-->
    <?php include 'info.php'; //echo $_SESSION['id'];?>
  </div>
  
</heder>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Метод "Validator"
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Метод предназначен обрабатывать ввод информации в форму авторизации/регистрации. Название метода -  validator.get. 

        </strong> Чтобы использовать этот метод Вам необходимо отправить запрос следующего  вида: <br>
         http://localhost:8888/php/lessons_php/module_1_project_validator/project_validator/validator.get . <br>
         
         <code>Или можете использовать  готовые конструкции запроса:
            <a href="/php/lessons_php/module_1_project_validator/project_validator/validator.get" class="btn btn-success">validator.get</a> 
            
          </code>
        <br><br>
        <strong>Для преподователя, пошаговое описание хода мыслей ученика при разработке компонента:</strong> <br>
         <code> 
          <li> 1.Готовый для использования компонент. </li>
          <li>2.Стартовая страница "My_API.php".</li>    
          <li>3.Компонент разместил в отдельной папке "project_validator" точка входа в проект index.php.</li>
          <li>4.Проект  структурирован в рамках логики 'MVC'.</li>      
                4.1 Файлы категории 'controller'  - 'form_processing.php' в каталоге "controller". <br> 
                4.2 Файлы категории Model - 'validator.php'  в  папке 'model'.<br>
                4.3 Файл из категории 'view'  - 'form_view.php' в папке  'view". <br>
         </code>
      </div>
    </div>
  </div>
  
  
</div>
<footer>
<div class="card">
  <div class="card-header">
  <p></p>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p></p>
      <footer class="blockquote-footer"><cite title="Source Title">My API</cite></footer>
    </blockquote>
  </div>
</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>    
</body>
</html>