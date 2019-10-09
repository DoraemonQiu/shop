<?php
$new_pwd=$_GET['new_pwd'];
$old_pwd=$_GET['old_pwd'];
session_start();
$id=$_SESSION['user']['id'];
include_once ('connect.php');
$arr=$link->exec("UPDATE `user_shops` SET `pwd`='{$new_pwd}' where id='{$id}' and `pwd`='{$old_pwd}'");
$link=null;
echo json_encode($arr);
