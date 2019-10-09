<?php
$id=$_GET['id'];
include_once 'connect.php';
$table=$link->query("SELECT * FROM `shop_list` WHERE id='$id'");
$row=$table->fetch();
echo json_encode($row);