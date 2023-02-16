<?php
require_once("../template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
    }
    if(isset($_POST['cancel'])){
        $id = post('id');
        // echo $id;
    }
    $db->exec("UPDATE `details` SET `stt` = 'Yêu cầu hủy đơn' WHERE `id` = '$id'");
    echo '<script type="text/javascript">alert("Đã gửi yêu cầu hủy đơn thành công");window.location="../index.php?action=chitietdonhang&id=' . $id . '"</script>';
?>