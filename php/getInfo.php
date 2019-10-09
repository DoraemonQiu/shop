<?php
session_start();
$json=$_SESSION['user'];
echo json_encode($json);

