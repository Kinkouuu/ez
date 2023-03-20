<?php
require_once("../control/head.php");
if (!isset($_SESSION['admin'])){
    echo '<script>alert("You must login with admin account");window.location = "http:/ez/a/index.php";</script>';
  }else{
    $a_id = $_SESSION['admin'];
  }
?>
<?php
if(isset($_POST['save'])){
    $today = date("Y-m-d");
    $id = post('id');
    $o_id = post('o_id');
    $cost = post('cost');
    $a_note = post('a_note');
    $stt = post('stt');
    $sent = post('sent');
    $bill = post('bill');
    $soLuong = post('soLuong');
    $check = $db->query("SELECT * FROM `details` WHERE `id` = '$id'")->fetch();
    if($cost != $check['ship']){
      $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã cập nhật phí ship cost đơn hàng `$id` thành `$cost`')");
    }
    if($a_note != $check['a_note']){
      $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã cập nhật ghi chú đơn hàng `$id` thành `$a_note`')");
    }
    if($stt != $check['stt']){
      $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã cập nhật trạng thái đơn hàng `$id` thành `$stt`')");
    }
    if($sent != $check['d_date'] && $sent != ''){
      $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã cập nhật ngày gửi đơn hàng `$id` thành `$sent`')");
    }
    if($stt == 'Đã giao hàng'){
      $db->exec("UPDATE `details` SET `ship` = '$cost',`stt`= '$stt', `a_note` = '$a_note', `d_date` = '$sent',`d_day` = '$today' WHERE `id` = '$id'");
            $statist = $db->query("SELECT * FROM `statist` WHERE `o_date` = '$today'")->rowCount();
            if($statist > 0){
              $db->exec("UPDATE `statist` SET `sl_o`= sl_o + 1, `stt` = stt + $bill,`sl_p` = sl_p + $soLuong WHERE `o_date` = '$today'");
            }else{
              $db->exec("INSERT INTO `statist` (`o_date`,`sl_o`,`stt`,`sl_p`) VALUES ('$today','1','$bill','$soLuong')");
            }
      echo '<script>alert("Update order ID ' . $id . 'successfully"); window.location = "../details.php?o_id='.$o_id.'";</script>';
    }else{
      $db->exec("UPDATE `details` SET `ship` = '$cost',`stt`= '$stt', `a_note` = '$a_note', `d_date` = '$sent' WHERE `id` = '$id'");
      echo '<script>alert("Update order ID ' . $id . 'successfully"); window.location = "../details.php?o_id='.$o_id.'";</script>';
  }

}
?>
<?php
require_once("../control/end.php");
?>