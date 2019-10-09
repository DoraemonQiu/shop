<?php
session_start();
unset($_SESSION['admin']);
echo json_encode(true);