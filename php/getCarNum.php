<?php
session_start();
$uid=$_SESSION['user']['id'];
include_once 'connect.php';
$table=$link->query("SELECT `car` FROM `user_shops` WHERE id='$uid'");
$arr=json_decode($table->fetch()['car'],true);
echo count($arr);