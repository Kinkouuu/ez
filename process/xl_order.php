<?php
require_once("../template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
  }
?>
<?php
$today = strtotime(date('Y-m-d H:i:s')); //lay timstamp hen tai
if (isset($_POST['order'])){
    if (isset($_SESSION['s_id']) && $_SESSION['pid']) {
        $s_id = $_SESSION['s_id'];
        // echo $s_id;
        $p_id = $_SESSION['pid'];
        // echo $p_id;
        $for = post('saleFor');
        // echo $for;
    }else{
        $s_id = '';
        // echo $s_id;
        $p_id = '';
        // echo $p_id;
        $for ='';
        // echo $for;
    }
    $payment = $_SESSION['payment'];
    $o_name = post('o_name');
    $o_mail = post('o_mail');
    $o_phone = post('o_phone');
    $o_no = post('o_no');
    $o_street = post('o_street');
    $o_district = post('o_district');
    $o_ward = post('o_ward');
    $o_city = post('o_city');
    $note = post('note');
    $process = post('process');
    $today = strtotime(date('Y-m-d H:i:s')); //lay timstamp hen tai
}
$cart = $db->query("SELECT * FROM `cart` WHERE `u_id` = $u_id");
if ($cart->rowCount() == 0) { //ktra gio hang rong hay ko
    $tb = "Vui lòng thêm sản phẩm vào giỏ hàng!";
    header("location: ../index.php?action=giohang&tb= $tb");
}else{
    $db->exec("INSERT INTO `order` 
    (`u_id`, `o_phone`,`o_name`,`o_city`,`o_district`,`o_ward`,`o_street`,`o_no`,`note`,`process`,`payment`,`o_mail`) 
    VALUES ('$u_id', '$o_phone', '$o_name', '$o_city', '$o_district', '$o_ward', '$o_street', '$o_no','$note', '$process', '$payment','$o_mail')");
    $o_id= $db->lastinsertid();
    // echo $o_id;
    foreach($cart as $row){
        $dp_id = $row['p_id'];
        $product = $db->query("SELECT * FROM 
            (`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) 
                INNER JOIN `money` ON `money`.m_id = `price`.m_id 
                    WHERE `product`.p_id = '$dp_id'")->fetch();
        $sm_id = $product['sm_id'];
        $unit = $row['unit'];
        $book  = $row['book'];
        if($unit > '0'){ // dat hang stock
            $s_price = $product['p_stock'];
            if($p_id == $dp_id && $for =='stock'){ // kiem tra co giam gia hay khong
                    $sid = $s_id;
            }else{
                $sid = 0;
            }
            // echo $sid;
            // Them thong tin don hang stock //
            $db->exec("INSERT INTO `details` 
                (`o_id`,`p_id`,`sm_id`,`s_id`,`amount`,`d_price`,`fee`) 
                    VALUES('$o_id','$dp_id','$sm_id','$s_id','$unit','$s_price','40000')");
            // Cap nhat so luong con lai trong kho hang //
            $db->exec("UPDATE `product` SET `remain` = remain - $unit WHERE `p_id` = '$dp_id'");
        }
        if($book > 0){
            $gb = $db ->query("SELECT * FROM 
                (`product` INNER JOIN `gb_list` ON `product`.p_id = `gb_list`.p_id) 
                    INNER JOIN `gb` ON `gb_list`.g_id = `gb`.g_id 
                        WHERE `product`.p_id = '$dp_id' AND $today < `gb`.e_date")->fetch();
            $g_id = $gb['g_id']; // lay ma groupby cua san pham
            // echo $g_id;
            if($payment ='10%'){
                $gb_price = $product['p_gb'] * $product['ex'] * $product['factor'] + $product['p_10']; 
            }else if($payment ='50%'){
                $gb_price = $product['p_gb'] * $product['ex'] * $product['factor'] + $product['p_50']; 
            }else{
                $gb_price = $product['p_gb'] * $product['ex'] * $product['factor']; 
            }
            $db->exec("INSERT INTO `details` 
            (`o_id`,`p_id`,`sm_id`,`s_id`,`g_id`,`amount`,`d_price`,`fee`) 
                VALUES('$o_id','$dp_id','$sm_id','$s_id','$g_id','$book','$gb_price','40000')");
        }
    }
    header("Location:../index.php?action=donhang");
}

?>