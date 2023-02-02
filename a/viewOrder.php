<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <button class="btn btn-outline-success" id="export"><i class="fa-solid fa-file-export"></i> Export</button>
            <table class="table table-striped table-hover" style="overflow-x:auto;" id="dataList">
                <thead>
                    <tr>
                        <th>ID Lô hàng nhập</th>
                        <th>ID Sản phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Giá nhập Sản Phẩm</th>
                        <th>Tỷ giá</th>
                        <th>Giá nhập (VND)</th>
                        <th>Số Lượng Nhập </th>
                        <th>Ngày đặt hàng</th>
                        <th> Ngày thanh toán nhập hàng</th>
                        <th>ID Nhà cung cấp</th>
                        <th>Tên nhà cung cấp </th>
                        <th> Logo nhà cung cấp </th>
                        <th>Email nhà cung cấp</th>
                        <th> Số ĐT nhà cung cấp </th>
                        <th>Đại diện nhà cung cấp</th>
                        <th> Số điện thoại đại diện nhà cung cấp </th>
                        <th> Số nhà nhà cung cấp</th>
                        <th>Phố/Đường nhà cung cấp </th>
                        <th>Xã/Phường nhà cung cấp </th>
                        <th>Quận/Huyện nhà cung cấp </th>
                        <th>Thành Phố/Tỉnh nhà cung cấp</th>
                        <th>Quốc gia nhà cung cấp</th>
                        <th>Giấy tờ cần thiết</th>
                        <th>Ngành hàng</th>
                        <th> Danh mục</th>
                        <th>Loại hàng</th>
                        <th>Ngày xuất kho nhà cung cấp</th>
                        <th>Ngày nhận tại kho cửa khẩu</th>
                        <th>Ngày nhận tại kho Hà Nội</th>
                        <th>Giá vận chuyển tới cửa khẩu</th>
                        <th> Giá từ cửa khẩu về HN</th>
                        <th> Giá VC từ HN tới khách</th>
                        <th>ID khách đặt</th>
                        <th>SDT khách đặt</th>
                        <th>Email</th>
                        <th>Ngày đặt </th>
                        <th>ID Giỏ Hàng </th>
                        <th>ID Đơn hàng</th>
                        <th>Hình thức mở bán</th>
                        <th>Tên Họ & Đệm</th>
                        <th>Tên Riêng</th>
                        <th>Số nhà</th>
                        <th>Phố/Đường</th>
                        <th>Xã/Phường</th>
                        <th>Quận/Huyện</th>
                        <th>Thành Phố/Tỉnh</th>
                        <th>Ghi chú của khách</th>
                        <th>Ghi chú của admin</th>
                        <th>Số Lượng Mua</th>
                        <th>Giá mua</th>
                        <th>Giảm giá</th>
                        <th>Phí Vận Chuyển</th>
                        <th>Phụ phí</th>
                        <th>Tiền ship</th>
                        <th>Hình Thức Thanh Toán</th>
                        <th>Tổng tiền đơn hàng</th>
                        <th>Tiền Cọc</th>
                        <th>Tiền Cần Thanh Toán Nốt</th>
                        <th>SDT nhận hàng</th>
                        <th>Số nhà nhận hàng</th>
                        <th>Phố/Đường nhận hàng</th>
                        <th>Xã/Phường nhận hàng</th>
                        <th>Quận/Huyện nhận hàng</th>
                        <th>Thành Phố/Tỉnh nhận hàng</th>
                        <th>Ngày gửi hàng</th>
                        <th>Ngày nhận hàng</th>
                        <th>Trạng thái đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                <?php

$oders = $db->query("SELECT * FROM (`order` INNER JOIN `details` ON `order`.o_id = `details`.o_id) INNER JOIN `user` ON `order`.u_id = `user`.u_id");
foreach ($oders as $row) {
    $o_id = $row['o_id']; //id gio hang
    $dem = $db->query("SELECT 'id' FROM `details` WHERE `details`.o_id = '$o_id'")->rowCount();
    //  echo $dem;
    $id = $row['id']; // id don hang
    $p_id = $row['p_id']; //id san pham
    $sm_id = $row['sm_id']; //id lo hang
    $s_id = $row['s_id']; //id giam gia
    $g_id  = $row['g_id']; //id dot gb
    // echo $sm_id ."= " .$p_id;
?>
                    <tr>

                            <td><?= $sm_id ?></td>
                            <td><?= $p_id ?></td>
                            <?php
                            $sp = $db->query("SELECT * FROM ((`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id ) INNER JOIN `cate` ON `cate`.c_id = `product`.c_id WHERE `product`.p_id = '$p_id'")->fetch();
                            ?>
                            <td><?= $sp['p_name'] ?></td>
                            <td>
                                <img src="<?= $sp['p_img'] ?>" alt="" style="width:100%">
                            </td>
                            <?php
                            $smt = $db->query("SELECT * FROM ((`shipment` INNER JOIN `sm_list` ON `shipment`.sm_id = `sm_list`.sm_id) INNER JOIN `factory` ON `shipment`.f_id = `factory`.f_id) INNER JOIN `money` ON `money`.m_id = `sm_list`.m_id WHERE `shipment`.sm_id = '$sm_id' AND `p_id` ='$p_id'")->fetch();

                            ?>
                            <td>
                                <?= number_format($smt['sm_price'], 2, '.', '') . " " . $smt['sign'] ?>
                            </td>
                            <td>
                                <?= number_format($smt['ex_price']) . " VND" ?>
                            </td>
                            <td>
                                <?= number_format($smt['sm_price'] * $smt['ex_price']) ?>
                            </td>
                            <td>
                                <?= number_format($smt['sm_amount']) ?>
                            </td>
                            <td>
                                <?= $smt['sm_date'] ?>
                            </td>
                            <td>
                                <?= $smt['pay_date'] ?>
                            </td>
                            <td>
                                <?= $smt['f_id']; ?>
                            </td>
                            <td>
                                <?= $smt['f_name'] ?>
                            </td>
                            <td>
                                <img src="<?= $smt['f_img'] ?>" alt="">
                            </td>
                            <td>
                                <?= $smt['f_mail'] ?>
                            </td>
                            <td>
                                <?= $smt['f_phone'] ?>
                            </td>
                            <td>
                                <?= $smt['represent'] ?>
                            </td>
                            <td>
                                <?= $smt['rep_phone'] ?>
                            </td>
                            <td>
                                <?= $smt['f_no'] ?>
                            </td>
                            <td>
                                <?= $smt['f_street'] ?>
                            </td>
                            <td>
                                <?= $smt['f_ward'] ?>
                            </td>
                            <td>
                                <?= $smt['f_district'] ?>
                            </td>
                            <td>
                                <?= $smt['f_city'] ?>
                            </td>
                            <td>
                                <?= $smt['f_nation'] ?>
                            </td>
                            <td>
                                <?= $smt['license'] ?>
                            </td>
<td>
    <?= $sp['direc']?>
</td>
<td>
    <?= $sp['cate']?>
</td>
<td>
    <?= $sp['type']?>
</td>
<td>
<?= $smt['ex_date'] ?>
</td>
<td>
<?= $smt['im_date'] ?>
</td>
<td>
<?= $smt['hn_date'] ?>
</td>
<td>
<?= number_format($smt['gate_ship']) ?>
</td>
<td>
<?= number_format($smt['hn_ship']) ?>
</td>
<td>
    <?= $row['ship']?>
</td>
<td>
    <?= $row['u_id']?>
</td>
<td>
    <?= $row['phone']?>
</td>
<td>
    <?= $row['email']?>
</td>
<td>
    <?= $row['o_date']?>
</td>
<td>
    <?= $row['o_id']?>
</td>
<td>
    <?= $row['id']?>
</td>

<td>
<?php
if($row['g_id'] == 0){
    echo 'In stock';
}else{
    echo 'Group buy #'. $row['g_id'] ;
}
?>
</td>
<td>
<?= $row['f_name']?>
</td>
<td>
<?= $row['l_name']?>
</td>
<td>
<?= $row['no']?>
</td>
<td>
<?= $row['street']?>
</td>
<td>
<?= $row['ward']?>
</td>
<td>
<?= $row['district']?>
</td>
<td>
<?= $row['city']?>
</td>
<td>
<?= $row['note']?>
</td>
<td>
<?= $row['a_note']?>
</td>
<td>
<?= $row['amount']?>
</td>
<td>
<?= number_format($row['d_price'])?>
</td>
<?php
    $sid = $row['s_id'];
    // echo $sid;
    if($sid > 0 ){
        $gg = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$sid'")->fetch();
        $discount = $gg['discount'];
        
    }else{
        $discount = 0;
    }
?>
<td>
<?= number_format($discount) ?>
</td>
<td>
<?= number_format($row['fee'])?>
</td>
<td>
<?php
// $process = $row['process'];
echo number_format( $row['process'])?>
</td>
<td>
<?= number_format($row['ship'])?>
</td>
<td>
    <?= $row['payment']?>
</td>
<td>
    <?php $total = $row['amount'] * $row['d_price'] + $row ['fee'] +$row['process'] -$discount;
    if($total>0){
        echo number_format($total);
    }else{
        echo '0';
    } ?>
</td>
<td>
    <?= number_format($row['deposit'])?>
</td>
<td>
<?= number_format($total-$row['deposit'])?>
</td>
<td>
    <?= $row['o_no']?>
</td>
<td>
    <?= $row['o_street']?>
</td>
<td>
    <?= $row['o_ward']?>
</td>
<td>
    <?= $row['o_district']?>
</td>
<td>
    <?= $row['o_city']?>
</td>
<td>
    <?= $row['note']?>
</td>
<td>
    <?= $row['a_note']?>
</td>
<td>
    <?= $row['d_date']?>
</td>
<td>
    <?= $row['d_day']?>
</td>
<td>
    <?= $row['stt']?>
</td>

                        <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('export').addEventListener('click', function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#dataList"));
    });
</script>
<?php
require_once("control/end.php");

?>