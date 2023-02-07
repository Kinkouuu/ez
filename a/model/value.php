<?php
require_once '../control/head.php';
?>

<?php
if(isset($_POST['nganh'])){
    $tmp = post('nganh'); 
    ?>
    <option value="" class="text-center">--Choose category--</option>
    <?php
        $cates = $db->query("SELECT * FROM `cate` WHERE `direc` = '$tmp' AND `cate` is not null AND `type` is null"); //select danh muc thuoc nganh hang
    foreach ( $cates as $cate ){
    ?>
    <option class="text-center" value="<?= $cate['cate'] ?>"><?= $cate['cate'] ?></option>
    <?php
    }
}
?>

<?php
if(isset($_POST['dm'])){
$tam = post('dm');
//    echo '<script>alert(" '.$tam. '")</script> ';
    $types = $db->query("SELECT * FROM `cate` WHERE `cate` = '$tam' AND `type` is not null"); // select loai hang thuoc danh
foreach ( $types as $type ){
    ?>
    <option class="text-center" value="<?= $type['c_id'] ?>"><?= $type['type'] ?></option>
    <?php
}
}
//
$cty= post('cty');
//    echo '<script>alert(" '.$cty. '")</script> ';
    $smts = $db->query("SELECT * FROM `shipment` WHERE `f_id` = '$cty' "); // select loai hang thuoc danh
foreach ( $smts as $smt ){
    ?>
    <option class="text-center" value="<?= $smt['sm_id'] ?>"><?= $smt['sm_code'] ?></option>
    <?php
}
?>
<?php
require_once '../control/end.php';
?>