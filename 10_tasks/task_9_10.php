<?php
session_start();
include 'init.php';
if(isset($_SESSION['message'])){
    $status=$_SESSION['message']['status'];
    $text=$_SESSION['message']['text'];
    //echo "<p class=\"$status\">$text</p>";
    unset ($_SESSION['message']);
} 

if(isset($_POST['text'])){
    $text=$_POST['text']; 
    $query = "SELECT COUNT(*) as count FROM task_8 WHERE text='$text'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $isPage=mysqli_fetch_assoc($result)['count'];
    
    if($isPage){
        $_SESSION['message'] = [
                                'text'=>'You should check in on some of those fields below.!!!',
                                'status'=>'alert-danger'
                                ];
    }
    else
    {
        
        $query = "UPDATE  task_8 SET text='$text' WHERE id=1";
        $result=mysqli_query($link, $query) or die(mysqli_error($link));    
        $_SESSION['message'] =  [
                                'text'=>"you have successfully dubbed the entry",
                                'status'=>'alert-success'
                                 ];
                                 
         
    }
}
else{
    $text='';
    $_SESSION['message'] = [
        'text'=>'you havent filled out the form yet',
        'status'=>'alert-success'
        ];
}


$query = "SELECT * FROM  task_8";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
       
$content =      '<div class="alert '.$_SESSION['message']['status'].' fade show" role="alert">
                 '.$_SESSION['message']['text'].'
                </div>
                <form action="" method="POST">
                <label class="form-label" for="simpleinput" name="text">you entered: '.$text.'</label>
                <input type="text" id="simpleinput" class="form-control" name="text">
                <button class="btn btn-success mt-3">Submit</button>
                </form>';
    
       
include 'task_layout_9_10.php';

