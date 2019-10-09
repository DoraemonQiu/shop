<?php
include_once ('connect.php');
$table=$link->query("select id,username,tel from user_shops where is_pay=1");
while ($row=$table->fetch()){
    $arr[]=$row;
}
$link=null;
echo json_encode($arr);

