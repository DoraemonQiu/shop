<?php
$pay_json=$_GET['json'];
$total=$_GET['total'];
include_once ('connect.php');
session_start();
$uid=$_SESSION['user']['id'];
$table=$link->query("select car from user_shops where id='{$uid}'");
$arr=json_decode($table->fetch()[0],true);
$pay_arr=json_decode($pay_json,true);
foreach ($pay_arr as $obj){
    $id=$obj['id'];
    $arr=array_diff($arr,[$id]);
}
$car_json=json_encode($arr);
$sql="UPDATE `user_shops` SET pay='{$pay_json}',car='{$car_json}',total='{$total}',is_pay=1 WHERE id='{$uid}'";
$num=$link->exec($sql);
$link=null;
echo $num;
