<?php
$config = include '/Applications/MAMP/htdocs/php/lessons_php/module_1/database/config.php';
include '/Applications/MAMP/htdocs/php/lessons_php/module_1/database/QueryBuilder.php';
include '/Applications/MAMP/htdocs/php/lessons_php/module_1/database/Connection.php';

return new QueryBuilder(Connection::make($config['database']));