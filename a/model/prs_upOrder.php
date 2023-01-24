<?php
require_once("../control/head.php");
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
    if($stt == 'Đã giao hàng'){
        $db->exec("UPDATE `details` SET `ship` = '$cost',`stt`= '$stt', `a_note` = '$a_note', `d_date` = '$sent',`d_day` = '$today' WHERE `id` = '$id'");
        // var_dump($up);
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