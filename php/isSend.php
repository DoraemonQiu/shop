<?php
session_start();
$uid=$_SESSION['user']['id'];
include_once 'connect.php';
$table=$link->query("SELECT `is_pay` FROM `user_shops` WHERE id='$uid'");
echo json_encode( $table->fetch());