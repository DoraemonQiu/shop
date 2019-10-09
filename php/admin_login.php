<?php
extract($_POST);
session_start();
if($yzm!=$_SESSION['vCode']){
    $flag=0;
}else{
    include_once ('connect.php');
    $result=$link->query("SELECT id,nc FROM `manager` WHERE zh='{$name}'and pwd='{$pwd}'");
    $link=null;
    if ($result->rowCount()){
        $row=$result->fetch();
        $_SESSION['admin']=$row;
        $flag=2;
    }else{
        $flag=1;
    }
}
echo json_encode($flag);