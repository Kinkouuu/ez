<?php
require_once("../template/core.php");

if(isset($_POST['ggst'])){
    $p_id = post('p_id');
    $code = post('stCode');
    // echo $code;
    //  echo $p_id;
    if(empty($code)){
        header('Location:../index.php?action=giohang');
        unset($_SESSION['s_id']);
    }else{
        $_SESSION['pid'] = $p_id;
        $sale = $db->query("SELECT * FROM `sale` WHERE `code` = '$code'");
        if($sale->rowCount() == 0){ // check ma co ton tai hay ko
            $reply = 'Mã giảm giá không tồn tại';
            header("location:../index.php?action=giohang&reply='$reply'");
        }else{
            $ttgg = $sale->fetch(); // lay thong tin ma giam gia
            $s_id = $ttgg['s_id'];
            $sale_product = $db->query("SELECT * FROM `sale_product` WHERE `s_id` = '$s_id' AND `p_id` =  '$p_id'");
            if($sale_product->rowCount() == 0){ // check danh sach san pham duoc dung
                $reply = 'Mã giảm giá không áp dụng cho sản phẩm này';
                header("location:../index.php?action=giohang&reply='$reply'");
            }else{
                $sale_user = $db->query("SELECT * FROM `sale_user` WHERE `s_id` = '$s_id' AND `u_id` = '$u_id'");
                if($sale_user->rowCount() == 0){ //check danh sach nguoi duoc dung
                    $reply = 'Bạn không đủ điều kiện sử dụng mã này';
                    header("location:../index.php?action=giohang&reply='$reply'");
                }else{
                    $discount = $sale_user->fetch();
                    $time = $db->query("SELECT count(`details`.id) as `times` FROM `details` INNER JOIN `order` ON `details`.o_id = `order`.o_id WHERE `details`.s_id = $s_id AND `order`.u_id = '$u_id' AND `details`.stt != 'Đã hủy đơn'")->fetch();
                    if($discount['max'] <= $time['times']){ // check xem con luot dung ko
                        $reply = 'Bạn đã hết lượt dùng mã giảm giá này';
                    header("location:../index.php?action=giohang&reply='$reply'");
                    }else{
                        $sotien = $ttgg['discount'];
                        $reply = 'Bạn đã được giảm ' .number_format($sotien) . " VND";
                        $_SESSION['s_id'] = $ttgg['s_id'];
                        header("location:../index.php?action=giohang&reply='$reply'");
                    }
                }
            }
        }
    }
}
if(isset($_POST['gggb'])){
    $p_id = post('p_id');
    $code = post('gbCode');
    // echo $code;
    // echo $p_id;
    if(empty($code)){
        header('Location:../index.php?action=giohang');
    }
}
?>