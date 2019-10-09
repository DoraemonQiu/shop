<?php
$id=$_GET['id'];
include_once ('connect.php');
$table=$link->query("select * from user_shops where id=$id");
$row=$table->fetch();
$link=null;
echo json_encode($row);

