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
    $sm_id = post('sm_id');
    $p_id = post('p_id');
    $sm_price = post('sm_price');
    $m_id = post('m_id');
    $ex_price = post('ex_price');
    $sm_amount = post('sm_amount');
    $gate_ship = post('gate_ship');
    $hn_ship = post('hn_ship');
    $sm_date = post('sm_date');
    $pay_date = post('pay_date');
    $ex_date = post('ex_date');
    $im_date = post('im_date');
    $hn_date = post('hn_date');
    // echo $sm_price;
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id','Đã thay đổi thông tin sản phẩm ID = `$p_id` của lô hàng #`$sm_id` ')");
      $db->exec("UPDATE `sm_list` SET `sm_price` = '$sm_price', `m_id` = '$m_id',`ex_price` = '$ex_price',`sm_amount` = '$sm_amount',`gate_ship`= '$gate_ship',`hn_ship`='$hn_ship',`sm_date`='$sm_date',`pay_date`='$pay_date',`ex_date`='$ex_date',`im_date`='$im_date',`hn_date`='$hn_date' WHERE `sm_id` = '$sm_id' AND `p_id` = '$p_id'");
  // var_export($up);  
  header("location: ../view/addSMList.php?sm_id=$sm_id");
}
if(isset($_POST['del'])){
  $sm_id = post('sm_id');
  $p_id = post('p_id');
  $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id','Đã xóa sản phẩm ID = `$p_id` khỏi danh sách lô hàng #`$sm_id` ')");
$db->exec("DELETE FROM `sm_list` WHERE `sm_id` = '$sm_id' AND `p_id` = '$p_id'");
header("location: ../view/addSMList.php?sm_id=$sm_id");
}
if (isset($_POST['add'])) {
  $sm_id = post('sm_id');
// echo $sm_id;
  if(isset($_POST['addSP'])){
      foreach($_POST['addSP'] as $sp){
      $db->exec("INSERT INTO `sm_list` (`sm_id`,`p_id`) VALUES ('$sm_id','$sp')");
      $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id','Đã thêm sản phẩm ID = `$sp` vào danh sách lô hàng #`$sm_id` ')");
      echo '<script>alert("Add new product to shipment successfull"); window.location = "../view/addSMList.php?sm_id='.$sm_id.'";</script>';
      }
  }else{
      echo '<script>alert("Please choose product or factory of shipment"); window.location = "../view/addSMList.php?sm_id='.$sm_id.'";</script>';
  }
}
?>
<?php
require_once("../control/end.php");
?>