<?php
session_start();
$uid=$_SESSION['user']['id'];
include_once 'connect.php';
$json=json_encode(array());
$num=$link->exec("UPDATE `user_shops` SET `car`='$json' WHERE id='$uid'");
$link = null;
if ($num){
    $flag=2;//删除成功
}else
    $flag=3;//失败
echo json_encode($flag);