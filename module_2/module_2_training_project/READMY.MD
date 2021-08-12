Установка:
Клонировать репозиторий
composer install
Тут можно:
Регистрироваться
Делать login
Редактировать свои данные
Редактировать свои ссылки на соцсети (раньше это было возможно только при создании пользователя от имени администратора)
Просматривать профили других пользователей (клик по аватарке)
Менять статус
Менять аватарку
Менять Email и пароль (указать текущий и новый пароль)
Удалять своего пользователя
От имени администратора можно:
Все то же, что и от имени рядового пользователя
Редактировать данные других пользователей
Удалять профили других пользователей
Дополнительно:
Есть пагинация (по 6 пользователей на страницу)
Настройки подключения к базе данных в файле public/index.php на строке 23
  	PDO::class => function() {
        return new PDO('mysql:host=localhost;dbname=examdb;charset=utf8', 'root', 'root');
  	},
Прилагается дамп базы данных с пользователями
Email администратора johndoe@gmail.com
На случай пустой базы данных оставлена возможность сделать текущего залогиненного пользователя администратором. Для этого нужно перейти по адресу "/becameadmin".
Можно отключить эту возможность, удалив строку 56 из public/index.php
	$r->addRoute('GET', '/becameadmin', ['App\Controller\AuthorizationController', 'becameAdmin']);
Аккаунты пользователей из базы:

johndoe@gmail.com
dicaprio@gmail.com
ivanivanov@mail.com
petrsamoilov@gmail.com
kirillzacharov@gmail.com
elizavetam@gmail.com
maximsemenov@gmail.com
sergeyrudakov@gmail.com
vladislavvolkov@gmail.com
knyazev@mail.com
kiraastahova@mail.com
ivankuznecov@gmail.com
vladimirsmirnov@gmail.com
novikovap@gmail.com
michaila@gmail.com
Ко всем пользователям пароль: 12345
