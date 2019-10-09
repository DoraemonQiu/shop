<?php
session_start();
if(isset($_SESSION['user'])){
    $login['flag']=true;
    $login['data'] = $_SESSION['user'];
}else{
    $login['flag']=false;
}
echo json_encode($login);
