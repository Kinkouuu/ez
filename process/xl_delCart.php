<?php
require_once("../template/core.php");

if (isset($_POST['dellStock'])){
    $p_id = post('del_id');
    $isGB = $db->query("SELECT * FROM `cart` WHERE `p_id` = '$p_id' AND `u_id` ='$u_id'")->fetch();
    if($isGB['book'] > 0){
        $db->exec("UPDATE `cart` SET `unit` = '0' WHERE `p_id` = '$p_id' AND `u_id` ='$u_id'");
    }else{
        $db->exec("DELETE FROM `cart` WHERE `p_id` = '$p_id' AND `u_id` ='$u_id'");
    }
}

if (isset($_POST['dellGb'])){
    $p_id = post('del_id');
    $isGB = $db->query("SELECT * FROM `cart` WHERE `p_id` = '$p_id' AND `u_id` ='$u_id'")->fetch();
    if($isGB['unit'] > 0){
        $db->exec("UPDATE `cart` SET `book` = '0' WHERE `p_id` = '$p_id' AND `u_id` ='$u_id'");
    }else{
        $db->exec("DELETE FROM `cart` WHERE `p_id` = '$p_id' AND `u_id` ='$u_id'");
    }
}
unset($_SESSION['s_id']); // xoa session giam gia khi leave khoi trang cart
header("Location:../index.php?action=giohang");
?>