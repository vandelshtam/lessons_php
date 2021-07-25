<?php


use App\QueryBuilder;

$db = new QueryBuilder;
//запрос всех данных
//$posts = $db->getAll('posts');
//var_dump($posts);

//запись в таблицу
//$db->insert(['title' => 'adra cadabra yes'], 'posts');

//изменение записи в таблице
//$db->update(['title' => 'adra cadabra yes 2'], 46, 'posts');

//удаление записи в таблице
$db->delete( 45, 'posts');
