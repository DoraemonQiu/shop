<?php
$id=$_GET['id'];
include_once "connect.php";
$result=$link->query("select * from shop_list where id='$id'");
$row=$result->fetch();
$link=null;
echo json_encode($row);