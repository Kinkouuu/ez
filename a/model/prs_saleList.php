<?php
require_once("../control/head.php");
if (!isset($_SESSION['admin'])){
    echo '<script>alert("You must login with admin account");window.location = "http:/ez/a/index.php";</script>';
  }else{
    $a_id = $_SESSION['admin'];
  }
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
    }
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã thêm tất cả người dùng vào danh sách sử dụng mã giảm giá `$s_id`')");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}
//xoa tat ca nguoi dung
if (isset($_POST['delUser'])) {
    // echo $s_id;
    $db->exec("DELETE FROM `sale_user` WHERE `s_id`='$s_id'");
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã xóa tất cả người dùng khỏi danh sách sử dụng mã giảm giá `$s_id`')");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}

if (isset($_POST['save'])) { // thay doi so lan su dung
    $u_id = post('u_id');
    $max = post('max');
    // echo $s_id;
    // // echo $u_id;
    // // echo $max;
    $db->exec("UPDATE `sale_user` SET `max` = '$max' WHERE `u_id` = '$u_id' AND `s_id` = '$s_id'");
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã thay đổi số lần sử dụng mã giảm giá `$s_id` của người dùng `ID = $u_id` thành $max')");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}
if (isset($_POST['saveMax'])) { // thay doi so lan su dung cho tat ca user
    $allMax = post('allMax');
    $db->exec("UPDATE `sale_user` SET `max` = '$allMax' WHERE `s_id` = '$s_id'");
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã thay đổi số lần sử dụng mã giảm giá `$s_id` của tất cả người dùng thành $max')");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}

//them tat ca san pham
if (isset($_POST['allSP'])) {
    $add = $db->query("SELECT * FROM `product` WHERE `p_id` NOT IN (SELECT `p_id` FROM `sale_product` WHERE `s_id` = '$s_id')");
    foreach ($add as $row) {
        $p_id = $row['p_id'];
        // echo $u_id;
        $db->exec("INSERT INTO `sale_product` (`s_id`, `p_id`) VALUES ('$s_id', '$p_id')");
        $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã áp dụng mã giảm `ID = $s_id ` cho tất cả sản phẩm')");
        echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
    }
}
//xoa tat ca san pham
if (isset($_POST['delSP'])) {
    $db->exec("DELETE FROM `sale_product` WHERE `s_id`='$s_id'");
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã hủy bỏ áp dụng mã giảm `ID = $s_id ` cho tất cả sản phẩm')");
    echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
}
//them san pham vao danh sach
if (isset($_POST['addSP'])) {
    if(isset($_POST['themSP'])){
        foreach($_POST['themSP'] as $sp){
            $db->exec("INSERT INTO `sale_product` (`s_id`, `p_id`) VALUES ( '$s_id', '$sp')");
            $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã thêm sản phẩm `ID = $sp` áp dụng mã giảm `ID = $s_id `')");
            echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
        }
    }else{
        header("location:../view/addSaleList.php?s_id=$s_id");
    }
}
// xoa san pham khoi danh sach
if (isset($_POST['rmvSP'])) {
    if(isset($_POST['xoaSP'])){
        foreach($_POST['xoaSP'] as $xsp){
            // echo $xsp;
            $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã hủy bỏ áp dụng mã giảm `ID = $s_id ` cho sản phẩm `ID = $xsp` ')");
            $db->exec("DELETE FROM `sale_product` WHERE `s_id` = '$s_id' AND `p_id` = '$xsp';");
            echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
        }
    }else{
        header("location:../view/addSaleList.php?s_id=$s_id");
    }
}
?>
<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>
