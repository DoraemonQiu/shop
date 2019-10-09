<?php
$id = $_GET['id'];
$title = $_GET['title'];
$price = $_GET['price'];
include_once 'connect.php';
$num =$link->exec("UPDATE shop_list SET name='$title',price='$price' WHERE id=$id");
if($num){
    $flag=1;
}else{
    $flag=0;
}
echo json_encode($flag);
