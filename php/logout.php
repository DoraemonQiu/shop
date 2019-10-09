<?php
include_once('connect.php');
session_start();
unset($_SESSION['user']);
echo json_decode(true);