<?php
require_once("template/core.php");
if (!isset($_SESSION['user'])) {
    echo '<script>window.location="signin.php"</script>';
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo '<script>window.location="?action=donhang"</script>';
}

$tt = $db->query("SELECT * FROM (`details` INNER JOIN `order` ON `order`.o_id = `details`.o_id)
                    INNER JOIN `product` ON `product`.p_id = `details`.p_id
                        WHERE `details`.id = '$id'")->fetch();
?>
<div class="row d-flex justify-content-evenly">
    <div class="col-md-5">
        <div class="row">
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Mã đơn hàng:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?= "#" . $tt['o_id'] . " - " . $tt['id']; ?></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Tên người nhận:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?= $tt['o_name']; ?></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Số điện thoại:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?= $tt['o_phone']; ?></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Email người nhận:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?= $tt['o_mail']; ?></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Địa chỉ nhận hàng:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?= $tt['o_no'] . " - " . $tt['o_street'] . " - " . $tt['o_district'] . " - " . $tt['o_ward'] . " - " . $tt['o_city']; ?></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Loại đặt hàng:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?php
                        if ($tt['g_id'] == 0) {
                            echo 'Hàng có sẵn';
                        } else {
                            echo 'Hàng group buy';
                        }
                        ?></p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <label for="">
                        <strong>
                            Trạng thái đơn hàng:
                        </strong>
                    </label>
                </div>
                <div class="col-md-8">
                    <p><?= $tt['stt'] ?></p>
                </div>
            </div>
            <?php
            if ($tt['note'] != '') {
            ?>
                <div class="d-flex">
                    <div class="col-md-4">
                        <label for="">
                            <strong>
                                Ghi chú:
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $tt['note']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="col-md-7">
        <div class="row">

            <div class="d-flex">
                <div class="col-md-6">
                    <a href="?action=thongtinsanpham&p_id=<?= $tt['p_id'] ?>">
                        <img src="<?= $tt['p_img'] ?>" alt="" style="width: 100%;">
                    </a>
                </div>
                <div class="col-md-6 ">
                    <div class="row text-center">
                        <div class="d-flex justify-content-around">
                            <input type="hidden" name="id" value="<?= $tt['id'] ?>">
                            <h4><?= $tt['p_name'] ?></h4>
                            <!-- Button trigger modal -->
                            <?php
                            if ($tt['stt'] != 'Đã hủy đơn' && $tt['stt'] != 'Yêu cầu hủy đơn' && $tt['stt'] != 'Đã giao hàng') {
                            ?>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="far fa-trash-can"></i>
                                Hủy đơn
                            </button>
                            <form action="process/xl_delOrder.php" method="POST">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <input type="hidden" name="id" value="<?= $tt['id'] ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title d-flex" id="exampleModalLabel">
                                                    Yêu cầu hủy đơn hàng
                                                    <p style="color:turquoise;margin-left:3px"><?= "#" . $tt['o_id'] . " - " . $tt['id']; ?></p>
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <strong>- Rất tiếc khi bạn muốn hủy đơn hàng của EZsupply.</strong><br>
                                                <span><br>- Nếu như có bất kì vấn đề hoặc thắc mắc, vui lòng liên hệ với chúng tôi qua hòm thư điện tử
                                                    <a href="mailto:hotro@ezsupply.app" style="color:blue">Hotro@ezsupply.app</a> hoặc đường dây nóng
                                                    <a href="tel:0916350289" style="color:blue">0916350289</a>.</span>
                                                <br><span>- Yêu cầu hủy đơn hàng của bạn sẽ được xử lý sau ít phút.</span>
                                                <br><span style="color:blue">* Số tiền mà bạn đã thanh toán/cọc trước sẽ được EZsupply hoàn trả lại trong vòng 10 ngày làm việc.</span>
                                                <br><small style="color:red">* Lưu ý: Phí dịch vụ sẽ KHÔNG được hoàn trả khi bạn hủy đơn.</small>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary" name="cancel">Xác nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }
                            ?>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Ngày đặt hàng:</strong>
                            <p><?= $tt['o_date'] ?></p>
                        </div>
                        <?php
                        if ($tt['d_date'] != '') {
                        ?>
                            <div class="d-flex justify-content-between">
                                <strong>Ngày gửi hàng:</strong>
                                <p><?= $tt['d_date'] ?></p>
                            </div>
                        <?php
                        }
                        if ($tt['d_day'] != '') {
                        ?>
                            <div class="d-flex justify-content-between">
                                <strong>Ngày nhận hàng:</strong>
                                <p><?= $tt['d_day'] ?></p>
                            </div>
                        <?php }
                        ?>
                        <div class="d-flex justify-content-between">
                            <strong>Đơn giá:</strong>
                            <p class="text-primary"> x<?= $tt['amount'] ?></p>
                            <p><?= number_format($tt['d_price']) ?> VND</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Phí vận chuyển:</strong>
                            <p><?= number_format($tt['fee']) ?> VND</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Giảm giá:</strong>
                            <?php
                            if ($tt['s_id'] == 0) {
                                $discount = 0;
                            } else {
                                $s_id = $tt['s_id'];
                                $sale = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
                                $discount = $sale['discount'];
                            }
                            ?>
                            <p style="color:#ff0000"> - <?= number_format($discount) ?> VND</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Thành tiền:</strong>
                            <?php
                            $tmp = $tt['d_price'] * $tt['amount'] + $tt['fee'];
                            if ($tmp <= $discount) {
                                $provi = 0;
                            } else {
                                $provi = $tmp - $discount;
                            }
                            ?>
                            <p><?= number_format($provi) ?> VND</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>