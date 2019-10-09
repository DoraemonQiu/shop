<?php
include_once "connect.php";
$result=$link->query("select * from shop_list order by id desc");
$link=null;
while ($row=$result->fetch()){
    $arr[]=$row;
}
echo json_encode($arr);



