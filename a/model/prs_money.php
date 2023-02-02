<?php
require_once("../control/head.php");
if (!isset($_SESSION['admin'])){
    echo '<script>alert("You must login with admin account");window.location = "http:/ez/a/index.php";</script>';
  }else{
    $a_id = $_SESSION['admin'];
  }

?>
<?php
    if (isset($_POST['save'])) {
        $cur = post('cur');
        $sign = post('sign');
        $ex = post('ex');
        $db->exec("INSERT INTO `money`  (`m_name`,`sign`,`ex`) VALUES ( '$cur','$sign','$ex');");
        $db-exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thêm loại tiền tệ mới `1 $sign = $ex VND`')");
        echo '<script>alert("Đã thêm ' . $cur . '"); window.location = "../money.php";</script>';
    }
?>
<?php
require_once("../control/end.php");
?>