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
        echo '<script>alert("Tên đăng nhập hoặc mật khẩu sai");window.location = "../index.php";</script>';
    } else {
        $_SESSION['admin'] = $hihi['a_id'];
        $a_id = $_SESSION['admin'];
        $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã đăng nhập vào hệ thống')");
        header("Location: ../home.php");
    }
}
?>