
<?php $this->layout('layout', ['title' => 'User Profile']) ?>

<h1>User Paginator</h1>
<p>Hello, <?=$this->e($name);?></p>




<?php foreach($items as $item):?>
<?php echo $item['id'];?>  <?php echo $item['title']; ?><br>
<?php endforeach;?>

<?= $paginator;?>

<!-- html код не нужен, достаточно вывода на экран  $paginator, компонент сам все сделает
<ul class="pagination">
    