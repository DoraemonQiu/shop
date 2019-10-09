<?php
include_once ('connect.php');
$user=$_POST['user_name'];
$pwd=$_POST['pwd'];
$yzm=$_POST['yzm'];
session_start();
if($yzm!=$_SESSION['vCode']){
    $flag=1;//验证码错误
}else{
    $result = $link->query("SELECT id,username,nc,tel,address FROM `user_shops` WHERE zh='$user' and pwd='$pwd'");
    $link=null;
    $row=$result->fetch();
    if ($row) {
        $_SESSION['user']=$row;
        $flag=$row['nc'];
    }else{
        $flag=2;//账号或密码错误
    }
}
echo json_encode($flag);


