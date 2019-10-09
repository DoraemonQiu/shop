<?php
include_once ('connect.php');
extract($_POST);
$result=$link->query("SELECT id FROM `user_shops` WHERE zh='$zh'");
$num=$result->fetch();
if(!$num){
    $num=$link->exec("INSERT INTO `user_shops`(`username`, `nc`, `pwd`, `address`, `tel`, `zh`) VALUES ('$username','$nc','$pwd','$address','$tel','$zh')");
    $row=$link->query("SELECT id FROM `user_shops` WHERE zh='$zh'");
    $id=$row->fetch();
    $link=null;
    if($num){
        session_start();
        $_SESSION['user']=array('nc'=>$nc,'id'=>$id);
        $flag=$nc;
    }
}else{
    $flag=2;
}
echo json_encode($flag);

