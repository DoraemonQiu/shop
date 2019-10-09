<?php
$id=$_GET['id'];
include_once ('connect.php');
$row=$link->exec("UPDATE `user_shops` SET is_pay=0 WHERE id='{$id}'");
$link=null;
echo json_encode($row);

