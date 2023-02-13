<?php
session_start();
require_once 'config.php';
require_once 'function.php';
if(isset($_SESSION['user'])){
    $uid = $_SESSION['user'];
    // echo $uid;
}
?>