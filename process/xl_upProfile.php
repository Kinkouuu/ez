<?php
require_once ("../template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
}
if(!isset($_POST['change'])){
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
}
?>