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
        Метод "Получение всех пользователей нашего Блога"
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Метод позволяет получить всех пользователей сайта блога. Название метода -  All_users.get</strong> Чтобы использовать этот метод Вам необходимо отправить запрос такого вида http://localhost:8888/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/All_users.get <code>. Или можете использовать данную готовую ссылку <a href="/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/All_users.get" class="btn btn-success">All_users.get</a> </code>
        <br><br>
        <strong>Для преподователя, пошаговое описание хода мыслей ученика при разработке компонента:</strong> <br>
         <code> 
          <li> 1.Цель создать готовый компонент, который можно использовать сразу без каких лдибо изменений. </li>
          <li>2.Чтобы компонент был удобен в использовании необходимо создать стартовую страницу "My_API.php" с описанием API  и сформированным готовым  https: запросом. Далее пользователь сможет перейти к компоненту.Стратовую страницу я посчитал возможным разместить в каталоге 'module_1_project_QueryBuilder' на одном уровне с проектом компонента, если ее сделать доступной это не должно нести опасность для проекта компонента, со страницы будет только ссылка на вход в компонент, стартовая страница никуда не подключена.</li>    
          <li>3.Компонент нужно разместить в отдельной папке "project_QueryBuilder" с обеспечением доступности входа в эту папку (проект), только через одну страницу index.php с роутером запроса, файл разместиться  в каталоге public. Для этого следует применить файл .htaccess расположенный в корне проекта. Для работы компонента потребуются файлы всех категорий архитектуры  MVC.</li>
          <li>4.Проект целиком старался структурировать в рамках логики 'MVC'.
                Браузер должен перейти по адресу: http://localhost:8888/php/lessons_php/module_1_project_QueryBuilder/project_QueryBuilder/All_users.get , принимает запрос файл index.php имеющейся в этом файле роутер отправляет только один верный запрос на файл list_of_all_users.php. Другие запросы, если они кем-то будут квалифицированы, будут обработаны роутером как ошибка "404"</li>      
                4.1 Файл категории 'controller' "list_of_all_users.php" решил разместить в соответсвующем каталоге "controller". Он обработает запрос, подключит файлы из категории "model", получит необходимую информацию из БД, подключит файл index_view.php для вывода информации на экран.<br> 
                4.2 Файлы категории "model" буду размещать в каталоге "QueryBuilder". Эти файлы должны обеспечить подключение к БД, обращение к БД и получение информации из БД.<br>
                4.3 Файл из категории 'view' index_view.php можно расположить в корневом каталоге проекта, посчитал что это возможно. Этот файл выведет на экран информацию из БД в удобном для пользователя виде. 
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