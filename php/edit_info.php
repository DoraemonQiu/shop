<?php
extract($_POST);
session_start();
$uid=$_SESSION['user']['id'];
include_once ('connect.php');
$sql="UPDATE `user_shops` SET username='$name',address='$address',tel='$tel',nc='$nc' WHERE id='{$uid}'";
$row=$link->exec($sql);
$link=null;
echo json_encode($row);

