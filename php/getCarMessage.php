<?php
$id=$_GET['id'];
include_once 'connect.php';
$table=$link->query("SELECT `car` FROM `user_shops` WHERE id='$id'");
$json=$table->fetch()['car'];
$arr=json_decode($json);
$str='(';
foreach ($arr as $v){
    $str.=$v.',';
}
$str=substr($str,0,strlen($str)-1).')';
$table=$link->query("select * from shop_list where id in $str");
$link=null;
$arr=null;
$arr[]=$table->fetch();
$arr[]=$table->fetch();
echo json_encode($arr);