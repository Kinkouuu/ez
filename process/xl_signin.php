<?php
require_once ("../template/core.php");
if(isset($_POST['signIn'])){
    $acc = post('acc');
    $pass = hashp(post('pass'));
    // echo $pass;

    $mail = $db->query("SELECT * FROM `user` WHERE `email` = '$acc' AND `pass` = '$pass'");
    $phone = $db->query("SELECT * FROM `user` WHERE `phone` = '$acc' AND `pass` = '$pass'");
    if(($mail->rowCount() == 0) && ($phone ->rowCount() == 0 )){

        echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu sai');window.location = 'signin.php';</script>";
    } else {

        $u_id = '';
        if($mail->rowCount() > 0){
            $data = $mail->fetch();
            $u_id = $data['u_id'];
        } 

        if($phone ->rowCount() > 0){
            $data = $phone->fetch();
            $u_id = $data['u_id'];
        }

        $_SESSION['user'] = $u_id;
    }
    header('location:../index.php');
    // echo $_SESSION['user'];

}
?>