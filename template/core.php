<?php
session_start();
require_once 'config.php';
require_once 'function.php';

if (isset($_SESSION['user'])) {
  $u_id = $_SESSION['user'];
} 

?>