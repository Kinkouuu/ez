<?php
require_once 'config.php';
require_once 'function.php';

if (isset($_SESSION['user'])) {
    $user = $db->query("SELECT * FROM `user` WHERE `u_id` = '" . $_SESSION['user'] . "' ")->fetch();
    if ($user == null) {
        session_unset();
        header("Location: index.php");
        exit;
    } else {
        $u_id = $user['u_id'];
    }
}

?>