<?php
session_start();
if (isset($_SESSION['admin'])){
    $flag=$_SESSION['admin']['nc'];
}else{
    $flag=false;
}
echo json_encode($flag);