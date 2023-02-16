<?php
require_once("../template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
  }
if (isset($_SESSION['user'])){
    $u_id = $_SESSION['user'];
    // echo $u_id;
    if(isset($_POST['addCart'])){
        $unit = post('unit');
        $book = post('book');
        $p_id = post('p_id');
        // echo $unit ." ". $book;
        if($unit == 0 && $book == 0){
            $loi = 'Số lượng đặt mua phải lớn hơn 0 ';
            
        }else{
            $check = $db->query("SELECT * FROM `cart` WHERE `u_id` = '$u_id' AND `p_id` = '$p_id'")->rowCount();
            if($check > 0){
                $db->exec("UPDATE `cart` SET `book` = '$book' , `unit` = '$unit' WHERE `u_id` = '$u_id' AND `p_id` = '$p_id'");
            }else{
                $db->exec ("INSERT INTO `cart` (`u_id`,`p_id`, `unit`,`book`) VALUES ('$u_id','$p_id', '$unit','$book')");
            }
            header("Location:../index.php?action=giohang");
        }
    }
}else{
    header("Location: ../signin.php");
}
?>