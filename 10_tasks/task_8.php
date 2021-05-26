<?php
include 'init.php';

$query = "SELECT * FROM  task_8";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
       
$content = '';
    foreach($data as $index=>$elem)
    {
        $index+=1;
        $content .='<tr>';
        $content .='<th scope="row">'.$index.'</th>';
        $content .='<td>'.$elem['first_name'].'</td>';
        $content .='<td>'.$elem['last_name'].'</td>';
        $content .='<td>'.$elem['user_name'].'</td>';
        $content .='<td>';
        $content .='<a href="show.php?id='.$elem['id'].'" class="btn btn-info">Редактировать</a>';
        $content .='<a href="edit.php?id='.$elem['id'].'" class="btn btn-warning">Изменить</a>';
        $content .='<a href="delete.php?id='.$elem['id'].'" class="btn btn-danger">Удалить</a>';
        $content .='</td>';
        $content .='</tr>'; 
    }
       
include 'task_layout_8.php';

