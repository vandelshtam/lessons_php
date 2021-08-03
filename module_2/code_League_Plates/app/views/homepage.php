
<?php $this->layout('layout', ['title' => 'User Profile']) ?>

<h1>User Profile</h1>
<p>Hello, <?=$this->e($name);?></p>
<?php foreach($posts as $post):?>
<?= $post['title'];?><br>
<?php endforeach;?>
