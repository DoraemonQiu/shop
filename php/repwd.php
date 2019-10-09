<?php
$old_pwd=$_GET['old_pwd'];
$new_pwd=$_GET['new_pwd'];
session_start();
$user= $_SESSION['admin']['nc'];
include_once('connect.php');
$arr=$link->query("select id from manager where nc='{$user}' and pwd='{$old_pwd}'");
if ($arr->fetch()){
    $num = $link->exec("UPDATE `manager` SET `pwd`='{$new_pwd}' where nc='{$user}'");
    $flag=1;
    $link = null;
} else{
    $flag=2;
}
echo json_encode($flag);
