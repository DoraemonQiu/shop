<?php
//header("Content-Type:text/html;charset=utf-8");
extract($_GET);
session_start();
$uid=$_SESSION['user']['id'];
include_once 'connect.php';
$num =$link->exec("UPDATE user_shops SET pay='$json',is_pay=1,total='$total' WHERE id=$uid");
$link=null;
if($num){
    $flag=1;
}else{
    $flag=2;
}
echo json_encode($flag);