<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover"  style="overflow:scroll">
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
                        <th>Email đại diện nhà cung cấp </th>
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
                        <th>ID khách mua hàng</th>
                        <th>SDT khách hàng</th>
                        <th>Ngày mua </th>
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
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
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
                    <tr>
                        <?php
                        $oders = $db->query("SELECT * FROM `order` INNER JOIN `details` ON `order`.o_id = `details`.o_id");
                        foreach($oders as $row){
                            $o_id = $row['o_id']; //id gio hang
                            $id = $row['id']; // id don hang
                            $p_id = $row['p_id']; //id san pham
                            $sm_id = $row['sm_id']; //id lo hang
                            $s_id = $row['s_id']; //id giam gia
                            $g_id  = $row['g_id']; //id dot gb
                            // echo $sm_id ."= " .$p_id;
                         
                            ?>
                                <td><?= $sm_id?></td>
                                <td><?= $p_id?></td>
                            <?php
                            $sp = $db->query("SELECT * FROM ((`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id ) INNER JOIN `cate` ON `cate`.c_id = `product`.c_id WHERE `product`.p_id = '$p_id'")->fetch();
                        ?>
                        <td><?= $sp['p_name']?></td>
                        <td>
                            <img src="<?= $sp['p_img']?>" alt="" style="width:100%">
                        </td>
                        <?php
                            $smt = $db->query("SELECT * FROM (`shipment` INNER JOIN `sm_list` ON `shipment`.sm_id = `sm_list`.sm_id) INNER JOIN `money` ON `money`.m_id = `sm_list`.m_id WHERE `shipment`.sm_id = '$sm_id' AND `p_id` ='$p_id'")->fetch();
                            
                        ?>
                        <td>
                            <?= number_format($smt['sm_price'],2,'.','') . " " . $smt['sign'] ?> 
                        </td>
                        <td>
                            <?= number_format($smt['ex_price']) . " VND" ?>
                        </td>
                        <td>
                            <?= number_format($smt['sm_price'] * $smt['ex_price']) ?>
                        </td>
                        <td>
                            <?= number_format($smt['sm_amount'])?>
                        </td>
                        <td>
                            <?= $smt['sm_date']?>
                        </td>
                        <td>
                            <?= $smt['pay_date']?>
                        </td>
                        <td>
                            <?=  $smt['f_id'];?>
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
<?php
require_once("control/end.php");

?>