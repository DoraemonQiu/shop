<?php
$title=$_GET['title'];
include_once 'connect.php';
$table=$link->query("select * from shop_list where name like '%$title%' order by id desc limit 0,1");
$link=null;
$result=$table->fetch();
echo json_encode($result);