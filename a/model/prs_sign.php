<?php
require_once '../control/head.php';
?>
<?php 
if (isset($_POST['signin'])) {
    $account = data($_POST['account']);
    $pass = data($_POST['pass']);
    $hihi = $db->query("SELECT `a_id` FROM `admin` WHERE `username` = '$account' AND `password` = '" . hashpass($pass) . "'")->fetch();
    if ($hihi['a_id'] == null) {
        session_destroy();
        echo '<script>alert("User or Pass incorrect");window.location = "../index.php";</script>';
    } else {
        $_SESSION['admin'] = $hihi['a_id'];
        header("Location: ../home.php");
        // echo $_SESSION['admin'];
    }
}
?>