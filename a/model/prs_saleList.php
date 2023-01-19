<?php
require_once("../control/head.php");

?>
<?php
$s_id = post('s_id');
$ds = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
?>
<?php
//them tat ca nguoi dung
if (isset($_POST['allUser'])) {
    $add = $db->query("SELECT * FROM `user` WHERE `u_id` NOT IN (SELECT `u_id` FROM `sale_user` WHERE `s_id` = '$s_id')");
    foreach ($add as $row) {
        $u_id = $row['u_id'];
        // echo $u_id;
        $db->exec("INSERT INTO `sale_user` (`s_id`, `u_id`,`max`) VALUES ('$s_id', '$u_id', '1')");
        echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
    }
}
//xoa tat ca nguoi dung
if (isset($_POST['delUser'])) {
    // echo $s_id;
    $db->exec("DELETE FROM `sale_user` WHERE `s_id`='$s_id'");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}

if (isset($_POST['save'])) { // thay doi so lan su dung
    $u_id = post('u_id');
    $max = post('max');
    $db->exec("UPDATE `sale_user` SET `max` = '$max' WHERE `u_id` = '$u_id' AND `s_id` = '$s_id'");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}
if (isset($_POST['saveMax'])) { // thay doi so lan su dung cho tat ca user
    $allMax = post('allMax');
    $db->exec("UPDATE `sale_user` SET `max` = '$allMax' WHERE `s_id` = '$s_id'");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}

//them tat ca san pham
if (isset($_POST['allSP'])) {
    $add = $db->query("SELECT * FROM `product` WHERE `p_id` NOT IN (SELECT `p_id` FROM `sale_product` WHERE `s_id` = '$s_id')");
    foreach ($add as $row) {
        $p_id = $row['p_id'];
        // echo $u_id;
        $db->exec("INSERT INTO `sale_product` (`s_id`, `p_id`) VALUES ('$s_id', '$p_id')");
        echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
    }
}
//xoa tat ca san pham
if (isset($_POST['delSP'])) {
    $db->exec("DELETE FROM `sale_product` WHERE `s_id`='$s_id'");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}

?>
<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>
