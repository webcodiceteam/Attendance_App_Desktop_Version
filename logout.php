<?php
include '../config/connect.php';
session_start();

$_SESSION['isLogin'] = 'no';
setcookie('Admin', false);
  // for check user is loged in or not
  if(!isset($_COOKIE['Admin'])){
    header('location:./login.php');
  }
    header('location:./login.php');
?>
