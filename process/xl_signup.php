<?php
require_once ("../template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
  }
if (isset($_POST['signUp'])){
    $f_name = post('f_name');
    $l_name = post('l_name');
    $phone = post('phone');
    $email = post('email');
    $pass = post('pass');
    $repass = post('repass');
    $city = post('city');
    $district = post('district');
    $ward = post('wrad');
    $street = post('street');
    $no = post('stNo');
    $mk = hashp($pass);
    $check = $db->query("SELECT * from `user` WHERE `phone` = '$phone' OR `email`='$email'")->rowCount();
    if($pass != $repass){
        echo "<script type='text/javascript'>alert('Mật khẩu không khớp. Vui lòng nhập lại');window.location = '../signup.php';</script>";
    }else if($check > 0){
        echo "<script type='text/javascript'>alert('Tài khoản email hoặc số điện thoại đã tồn tại.');window.location = '../signup.php';</script>";
    }else{
        $db->exec("INSERT INTO `user` (`phone`,`pass`,`f_name`,`l_name`,`city`,`district`,`ward`,`street`,`no`,`email`) VALUES ('$phone','$mk','$f_name','$l_name','$city','$district','$ward','$street','$no','$email')");
        echo "<script type='text/javascript'>alert('Đăng kí tài khoản thành công');window.location = 'signin.php';</script>";
    }
}
?>