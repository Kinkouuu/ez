<?php
require_once("template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
}
?>
    <div class="row d-flex justify-content-evenly">
        <?php
        $orders = $db->query("SELECT * FROM `order` WHERE `u_id`= '$u_id' ORDER BY `o_id` DESC");
        foreach ($orders as $order) {
            $o_id = $order['o_id'];
            $total = 0; // khoi tao tong tien don hang
        ?>
            <div class="col-md-8 border border-dark mb-2">

                <div class="row">
                    <div class="col-md-2 d-flex">
                        <strong># <?= $order['o_id'] ?></strong>
                    </div>
                    <div class="col-md-5 d-flex">
                        <strong>Ngày đặt: </strong>
                        <p><?= $order['o_date'] ?></p>
                    </div>
                    <div class="col-md-5 d-flex">
                        <?php
                        $count = $db->query("SELECT `id` FROM `details` WHERE `details`.o_id = '$o_id'");
                        echo '<strong>Số sản phẩm: </strong>' . $count->rowCount();
                        ?>
                    </div>
                    <div class="col-md-12">
                        <?php
                        $details = $db->query("SELECT * FROM 
                        `details` INNER JOIN `product` ON `details`.p_id = `product`.p_id 
                            WHERE `details`.o_id = $o_id");
                        foreach ($details as $detail) {
                        ?>
                        <!-- chi tiet don hang -->
                            <div class="row border-top p-1 m-1" >
                                <div class="col-md-2 d-flex">
                                    <strong>Mã đơn: </strong>
                                    <p><?= "#" . $order['o_id'] . " - " . $detail['id'] ?></p>
                                </div>
                                <div class="col-md-5 d-flex">
                                    <label for=""><strong>Loại đặt hàng: </strong></label>
                                    <p><?php
                                        if ($detail['g_id'] == 0) {
                                            echo 'Stock';
                                        } else {
                                            echo 'Group buy';
                                        }
                                        ?></p>
                                </div>
                                <div class="col-md-5 d-flex">
                                    <?php
                                    if ($detail['stt'] == 'Đang chờ xác nhận' || $detail['stt'] == 'Yêu cầu hủy đơn') {
                                        $color = 'orange';
                                    } else if ($detail['stt'] == 'Đã hủy đơn') {
                                        $color = 'red';
                                    } else {
                                        $color = 'blue';
                                    }
                                    ?>
                                    <p style="color:<?= $color ?>"><?= $detail['stt'] ?></p>
                                </div>
                                <div class="col-md-2">
                                    <a href="?action=thongtinsanpham&p_id=<?= $detail['p_id'] ?>">
                                        <img src="<?= $detail['p_img'] ?>" alt="" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <div class="d-flex">
                                        <strong>Mã sản phẩm: </strong>
                                        <p><?= $detail['p_id'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <strong>Tên sản phẩm:</strong>
                                        <p><?= $detail['p_name'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <strong>Số lượng: </strong>
                                        <p><?= $detail['amount'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <strong>Đơn giá: </strong>
                                        <p><?= number_format($detail['d_price']) ?> VND</p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <strong>Phí vận chuyển:</strong>
                                        <p><?= number_format($detail['fee']) ?> VND</p>
                                    </div>
                                    <div class="d-flex">
                                        <strong>Giảm giá:</strong>
                                        <?php
                                            if ($detail['s_id'] == 0) {
                                                $discount = 0;
                                            } else {
                                                $s_id = $detail['s_id'];
                                                $sale = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
                                                $discount = $sale['discount'];
                                            }
                                            ?>
                                        <p>-<?= number_format($discount)?> VND</p>
                                    </div>
                                    <div class="d-flex">
                                        <strong>Thành tiền: </strong>
                                        <?php
                                            $tmp = $detail['d_price'] * $detail['amount'] + $detail['fee'] ;
                                            if($tmp <= $discount ){
                                                $provi = 0;
                                            }else{
                                                $provi = $tmp - $discount;
                                                if($detail['stt'] != 'Đã hủy đơn'){
                                                    $total += $provi;
                                                }
                                            }
                                        ?>
                                        <p><?= number_format($provi)?> VND</p>
                                    </div>
                                    <div class="d-flex">
                                        <a href="?action=chitietdonhang&id=<?= $detail['id']?>" style="text-decoration: none;color:limegreen">
                                            <i class="far fa-eye"></i>
                                            Xem chi tiết đơn hàng 
                                    </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- Tong tien -->
                        <div class="row border-top border-4" style="background-color: lavender;">
                            <div class="col-md-4 d-flex">
                                <strong>Tiền hàng: </strong>
                                <p><?= number_format($total)?> VND</p>
                            </div>
                            <div class="col-md-4 d-flex">
                                <strong>Phí dịch vụ: </strong>
                                <p><?= number_format($order['process'])?> VND</p>
                            </div>
                            <div class="col-md-4 d-flex">
                                <strong>Tổng tiền: </strong>
                                <p><?= number_format($total + $order['process'] )?> VND</p>
                            </div>
                            <div class="col-md-4 d-flex">
                                <strong>Phương thức thanh toán: </strong>
                                <p><?= $order['payment']?></p>
                            </div>
                            <div class="col-md-4 d-flex">
                                <strong>Đã thanh toán: </strong>
                                <p><?= number_format( $order['deposit'])?> VND</p>
                            </div>
                            <div class="col-md-4 d-flex">
                                <strong>Cần phải trả: </strong>
                                <p><?= number_format($total + $order['process'] - $order['deposit'])?> VND</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php
        }
        ?>
    </div>
