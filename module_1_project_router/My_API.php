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
        Метод "Router - обработка запросов"
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Метод позволяет обрабатывать запросы и выводить запрошенную информацию на дисплей. Название метода -  touter.get. Метод позволдяет обработать 3 (три) зпроса: 1.переход на "домашнюю страницу", 2.Переход на страницу "о нас", 3. Переход на страницу "контакты". 

        </strong> Чтобы использовать этот метод Вам необходимо отправить запросы следующего  вида: <br>
         1.переход на домашнюю страницуhttp://localhost:8888/php/lessons_php/module_1_project_router/project_router/homepage.get . <br>
         2.переход на домашнюю страницуhttp://localhost:8888/php/lessons_php/module_1_project_router/project_router/about.get  . <br>
         3.переход на домашнюю страницуhttp://localhost:8888/php/lessons_php/module_1_project_router/project_router/contacts.get  . <br><br>
         <code>Или можете использовать  готовые конструкции запроса:
            <a href="/php/lessons_php/module_1_project_router/project_router/homepage.get" class="btn btn-success">homepage.get</a> 
            <a href="/php/lessons_php/module_1_project_router/project_router/about.get" class="btn btn-success">about.get</a>
            <a href="/php/lessons_php/module_1_project_router/project_router/contacts.get" class="btn btn-success">contacts.get</a>
          </code>
        <br><br>
        <strong>Для преподователя, пошаговое описание хода мыслей ученика при разработке компонента:</strong> <br>
         <code> 
          <li> 1.Создаю готовый компонент, который можно использовать сразу без каких либо изменений. </li>
          <li>2.Для удобства создал стартовую страницу "My_API.php" с описанием API  и сформированным готовым  https: запросом.</li>    
          <li>3.Компонент разместил в отдельной папке "project_router" с обеспечением доступности входа в проект, только через одну страницу index.php который производит роутинг запросов, файл разместил  в каталоге public. Файл .htaccess расположен в корне проекта.</li>
          <li>4.Проект  структурирован в рамках логики 'MVC'.
                Браузер должен перейти по адресу: http://localhost:8888/php/lessons_php/module_1_project_router/project_touter/("название одного из трех запросов").get , принимает запрос файл index.php имеющейся в этом файле роутер отправляет только  верный запрос на соответсвующие  файлы  'homepage.php', 'about.php', 'contacts.php'. Другие запросы, если они кем-то будут инициированы, будут обработаны роутером как ошибка "404"</li>      
                4.1 Файлы категории 'controller' ('homepage.php', 'about.php', 'contacts.php')" размеotys в соответсвующем каталоге "controller". Они обработывают запросы, при необходимости подключат файлы из категории "model", а также подключат при необходимости файл index_view.php для вывода информации на экран.<br> 
                4.2 Файлы категории "model" разместил в каталоге "model". Эти файлы должны обеспечить подключение к БД, обращение к БД и получение информации из БД.<br>
                4.3 Файл из категории 'view' index_view.php расположен в корневом каталоге проекта "project_router". Этот файл выведет на экран информацию из БД в удобном для пользователя виде. 
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