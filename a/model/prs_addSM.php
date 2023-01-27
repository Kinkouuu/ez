<?php
require_once("../control/head.php");
?>

<?php

if (isset($_POST['add'])) {
    $f_id = post('f_id');
    $sm_code = post('code');

    if(isset($_POST['addSP'])){
        $db->exec("INSERT INTO `shipment` (`f_id`,`sm_code`) VALUES ('$f_id','$sm_code')");
        $sm_id = $db->lastInsertId();
        foreach($_POST['addSP'] as $sp){
        $db->exec("INSERT INTO `sm_list` (`sm_id`,`p_id`) VALUES ('$sm_id','$sp')");
        echo '<script>alert("Add new shipment successfull"); window.location = "../shipment.php ";</script>';
        }
    }else{
        echo '<script>alert("Please choose product or factory of shipment"); window.location = "../view/addSM.php ";</script>';
    }
}
?>

<?php
require_once("../control/end.php");
?>