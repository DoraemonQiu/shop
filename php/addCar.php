<?php
$id=$_GET['id'];
session_start();
$uid=$_SESSION['user']['id'];
include_once 'connect.php';
$table=$link->query("SELECT `car` FROM `user_shops` WHERE id='$uid'");
$arr=json_decode($table->fetch()['car'],true);
if($arr==null) $arr=array();
if(in_array($id,$arr)) {
    exit("1");//商品重复
}
$arr[]=$id;
$json=json_encode($arr);
$num=$link->exec("UPDATE `user_shops` SET `car`='$json' WHERE id='$uid'");
$link = null;
if ($num){
    $flag=2;//添加商品成功
}else
    $flag=3;//添加失败

echo json_encode($flag);