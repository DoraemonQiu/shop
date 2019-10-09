<?php
$id=$_GET['id'];
session_start();
$uid=$_SESSION['user']['id'];
include_once 'connect.php';
$table=$link->query("SELECT `car` FROM `user_shops` WHERE id='$uid'");
$arr=json_decode($table->fetch()['car'],true);
$arr=array_diff($arr,[$id]);
$json=json_encode($arr);
$num=$link->exec("UPDATE `user_shops` SET `car`='$json' WHERE id='$uid'");
$link = null;
if ($num){
    $flag=2;//删除成功
}else
    $flag=3;//失败
echo json_encode($flag);