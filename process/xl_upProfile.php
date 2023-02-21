<?php
require_once ("../template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
}
if(isset($_POST['change'])){
    $u_id = post('u_id');
    $email = post('email');
    $f_name = post('f_name');
    $l_name = post('l_name');
    $city = post('city');
    $district = post('district');
    $ward = post('ward');
    $street = post('street');
    $no = post('no');
    $password = post('password');
    // echo $password;
    $check = $db->query("SELECT * FROM `user` WHERE `u_id` = '$u_id'")->fetch();
        if(hashp($password) != $check['pass']){
            $tb = "Mật khẩu không chính xác. Vui lòng nhập lại";
            header('Location:../index.php?action=thongtincanhan&tb=' .$tb );
        }else{
            $ktra = $db->query("SELECT  * FROM `user` WHERE `email` = '$email' AND `u_id` != '$u_id'")->rowCount();
            if($ktra > 0){
                echo $ktra;
                // echo $email . '= ' .$u_id;
                $tb = "Email này đã được đăng kí trên hệ thống. Vui lòng dùng địa chỉ email khác.";
                header('Location:../index.php?action=thongtincanhan&tb=' .$tb );
            }else{
                $db->exec("UPDATE `user` SET `email` = '$email' ,`f_name` = '$f_name' ,`l_name` = '$l_name',`city` = '$city' ,`district` = '$district', `ward`= '$ward' ,`street`='$street',`no` = '$no' WHERE `u_id` = '$u_id'");
                echo '<script type="text/javascript">alert("Đã thay đổi thông tin cá nhân thành công.");window.location="../index.php?action=thongtincanhan"</script>';
            }
        }
}
?>