<?php
$id=$_GET['id'];
include_once 'connect.php';
$num=$link->exec("delete from shop_list where id=$id");
if($num){
    $flag=1;
}else{
    $flag=0;
}
echo json_encode($flag);