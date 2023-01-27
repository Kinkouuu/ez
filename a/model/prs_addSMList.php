<?php
require_once("../control/head.php");
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
    $db->exec("UPDATE `sm_list` SET `sm_price` = '$sm_price', `m_id` = '$m_id',`ex_price` = '$ex_price',`sm_amount` = '$sm_amount',`gate_ship`= '$gate_ship',`hn_ship`='$hn_ship',`sm_date`='$sm_date',`pay_date`='$pay_date',`ex_date`='$ex_date',`im_date`='$im_date',`hn_date`='$hn_date' WHERE `sm_id` = '$sm_id' AND `p_id` = '$p_id'");
    header("location: ../view/addSMList.php?sm_id=$sm_id");
}

?>
<?php
require_once("../control/end.php");
?>