<?php
include_once('connect.php');
$num = 8;
$cur_page = $_GET['cur_page'];
$key = $_GET['key'];
$cur_record = $cur_page * $num;
if($key===''){
    $sql="select * from shop_list";
    $sql2="select * from shop_list order by id desc limit $cur_record,$num";
}else{
    $sql="select * from shop_list where name like '%$key%'";
    $sql2="select * from shop_list where name like '%$key%' order by id desc limit $cur_record,$num";
}
$result = $link->query($sql);
$pages = ceil($result->rowCount() / $num);//总页数
$result = $link->query($sql2);
$link = null;
$arr['pages']=$pages;
while ($row=$result->fetch()){
    $arr['list'][]=$row;
}
echo json_encode($arr);