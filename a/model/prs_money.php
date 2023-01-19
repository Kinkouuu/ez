<?php
require_once("../control/head.php");

?>
<?php
    if (isset($_POST['save'])) {
        $cur = post('cur');
        $sign = post('sign');
        $ex = post('ex');
        $db->exec("INSERT INTO `money`  (`m_name`,`sign`,`ex`) VALUES ( '$cur','$sign','$ex');");
        echo '<script>alert("Đã thêm ' . $cur . '"); window.location = "../money.php";</script>';
    }
?>
<?php
require_once("../control/end.php");
?>