<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<?php
$o_id = get('o_id');
$details = $db->query("SELECT * FROM `order` WHERE `order`.o_id = $o_id")->fetch(); // lay thong tin don tong

if (isset($_GET['id'])) { //xoa don
    $r_id = get('id');
    $db->exec("UPDATE `details` SET `stt` = 'Đã hủy đơn' WHERE `details`.o_id = $o_id AND `details`.id = '$r_id'");
    echo '<script>alert("Cancel order ID ' . $id . ' successfully"); window.location = "details.php?o_id=' . $o_id . '";</script>';
}
if (isset($_POST['sub'])) {
    $deposit = post('deposit');
    // echo $deposit;
    $db->exec("UPDATE `order` SET `deposit` = '$deposit' WHERE `order`.o_id = $o_id");
    echo '<script>alert("Update order ID ' . $id . ' deposit = ' . $deposit . ' VND"); window.location = "details.php?o_id=' . $o_id . '";</script>';
}
?>

<div class="container-fluid">
    <div class="row">
        <!-- thong tin don tong -->
        <div class="col-md-12 mt-5">
            <ul class="customer-in4">
                <b>
                    <li>Order ID: <?php echo "#" . $details['o_id'] ?></li>
                    <li style="text-transform: capitalize;">Customer name: <?php echo $details['o_name']; ?></li>
                    <li>Customer phone: <?php echo $details['o_phone']; ?></li>
                    <li>Address: <?php echo $details['o_no'] . " - " . $details['o_street'] . " - " . $details['o_ward'] . " - " . $details['o_district'] . " - " . $details['o_city']; ?></li>
                    <?php
                    if ($details['note'] != '') { ?>
                        <li>Customer's note: <?php echo $details['note']; ?> </li>
                    <?php } ?>

                    <li>Order date: <?php echo $details['o_date']; ?> </li>
                </b>
            </ul>
        </div>
        <div class="col-md-12 mt-2">
            <?php
            $total = 0; // tong tien
            $ds = $db->query("SELECT * FROM `details` WHERE `o_id` = '$o_id'"); // lay tung don hang thanh  phan
            foreach ($ds as $row) {
                $id = $row['id'];
                $tt = $db->query("SELECT * FROM (`details` INNER JOIN `product` ON `details`.p_id = `product`.p_id) INNER JOIN `cate` ON `product`.c_id = `cate`.c_id WHERE `id` = '$id'")->fetch();
                $s_id = $tt['s_id'];
                // lay thong tin giam gia
                if ($s_id == '0') {
                    $discount = 0;
                } else {
                    $sale = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
                    $discount = $sale['discount'];
                }
            ?>
                <!-- thong tin chi tiet -->
                <form action="model/prs_upOrder.php" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="o_id" value="<?= $o_id ?>">
                    <table class="table table-info table-hover">
                        <thead>
                            <tr class="table table-primary table-hover">
                                <th class="table-light" style="width: 1%;">
                                    ID
                                </th>
                                <th style="width: 15%;">
                                    &nbsp;
                                </th>
                                <th style="width: 10%;">
                                    Name Product
                                </th>
                                <th style="width: 5%;">
                                    Type
                                </th>
                                <th style="width: 5%;">
                                    Category
                                </th>
                                <th style="width: 10%;">
                                    Price
                                </th>
                                <th style="width: 5%;">
                                    Amount
                                </th>
                                <th style="width: 8%;">
                                    Ship-fee
                                </th>
                                <th style="width: 9%;">
                                    Discount
                                </th>
                                <th style="width: 12%;">
                                    Provisional
                                </th>
                                <th style="width: 10%;">
                                    Order Type
                                </th>
                                <th style="width: 10%;">
                                    Shipment
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                if ($tt['stt'] == 'Đã giao hàng') {
                                ?>
                                    <td style="background-color: blue; color:white">
                                        <?= $id ?>
                                    </td>
                                <?php
                                } else if ($tt['stt'] == 'Đã hủy đơn') {
                                ?>
                                    <td style="background-color: red; color:white">
                                        <?= $id ?>
                                    </td>
                                <?php
                                } else {
                                ?>
                                    <td style="background-color: green; color:white">
                                        <?= $id ?>
                                    </td>
                                <?php
                                }
                                ?>
                                <td style="width:15%;">
                                    <img src="<?php echo $tt['p_img'] ?>" alt="">
                                </td>
                                <td>
                                    <?= $tt['p_name'] ?>
                                </td>
                                <td>
                                    <?= $tt['type'] ?>
                                </td>
                                <td>
                                    <?= $tt['cate'] ?>
                                </td>
                                <td>
                                    <?= number_format($tt['d_price']) ?> VND
                                </td>
                                <td>
                                    <?= $tt['amount'] ?>
                                </td>
                                <td>
                                    <?= number_format($tt['fee']) ?> VND
                                </td>
                                <td>
                                    <?= number_format($discount) ?> VND
                                </td>
                                <td>
                                    <?php
                                    $tmp = $tt['d_price'] * $tt['amount'] + $tt['fee'] - $discount;
                                    if ($tmp < 0) {
                                        $provi = 0;
                                    } else {
                                        $provi = $tmp;
                                    }

                                    if ($tt['stt'] == "Đã hủy đơn") { // ktra tinh trang don
                                    ?>
                                        <span style="color:red;text-decoration: line-through;"><?= number_format($provi) . " VND"; ?></span></br>

                                    <?php
                                        echo '0 VND';
                                    } else {
                                        $total += $provi;
                                        echo number_format($provi) . " VND";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php $g_id = $tt['g_id']; //lay thong tin dot mo gb
                                    if ($g_id != 0) {
                                        $gb = $db->query("SELECT * FROM `gb` WHERE `gb`.g_id = $g_id")->fetch();

                                    ?>
                                        <a href="view/addList.php?g_id=<?= $g_id ?>">Group buy#<?= $g_id ?></a>
                                    <?php
                                    } else {
                                        echo "In Stock";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php $sm_id = $tt['sm_id']; // lay thong tin lo hang
                                    if ($sm_id != 0) {
                                        $lo = $db->query("SELECT * FROM `shipment` WHERE `sm_id` = $sm_id")->fetch();
                                    ?>
                                        <a href="shipment.php?sm_id=<?= $sm_id ?>"> <?= $lo['sm_code'] ?>#<?= $sm_id ?></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <!-- dien thong tin -->
                            <tr class="table-success">
                                <td colspan="3">
                                    <div class="input-group">
                                        <label class="input-group-text">Ship-cost: </label>
                                        <input type="number" class="form-control" name="cost" value="<?= $tt['ship'] ?>">
                                        <span class="input-group-text">VND</span>
                                    </div>
                                </td>
                                <td colspan="9">
                                    <div class="input-group">
                                        <label class="input-group-text">Admin's note: </label>
                                        <input type="text" class="form-control" name="a_note" value="<?= $tt['a_note'] ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-success">
                                <td colspan="5">
                                    <div class="input-group">
                                        <label class="input-group-text">Status: </label>
                                        <?php

                                        if ($tt['stt'] != 'Đã hủy đơn' && $tt['stt'] != 'Đã giao hàng') { // Neu chua huy va chua giao
                                        ?>
                                            <select class="form-select" name="stt">
                                                <option value="Xác nhận đặt hàng" <?php echo $tt['stt'] == 'Xác nhận đặt hàng' ? ' selected ' : ''; ?>>Xác nhận đặt hàng</option>
                                                <option value="Đóng order" <?php echo $tt['stt'] == 'Đóng order' ? ' selected ' : ''; ?>>Đóng order</option>
                                                <option value="Đặt hàng nhà máy" <?php echo $tt['stt'] == 'Đặt hàng nhà máy' ? ' selected ' : ''; ?>>Đặt hàng nhà máy</option>
                                                <option value="Hàng ra khỏi nhà máy" <?php echo $tt['stt'] == 'Hàng ra khỏi nhà máy' ? ' selected ' : ''; ?>>Hàng ra khỏi nhà máy</option>
                                                <option value="Đã thông quan" <?php echo $tt['stt'] == 'Đã thông quan' ? ' selected ' : ''; ?>>Đã thông quan</option>
                                                <option value="Đến kho TP.HCM" <?php echo $tt['stt'] == 'Đến kho TP.HCM' ? ' selected ' : ''; ?>>Đến kho TP.HCM</option>
                                                <option value="Đến kho Hà Nội" <?php echo $tt['stt'] == 'Đến kho Hà Nội' ? ' selected ' : ''; ?>>Đến kho Hà Nội</option>
                                                <option value="Vận chuyển nội địa" <?php echo $tt['stt'] == 'Vận chuyển nội địa' ? ' selected ' : ''; ?>>Vận chuyển nội địa</option>
                                                <?php
                                                if ($tt['d_date'] != '0000-00-00') { //neu da chon ngay gui hang
                                                ?>
                                                    <option value="Đã giao hàng">Đã giao hàng</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        <?php
                                        } else {
                                            echo '<input class="form-control" name="stt" readonly value="' . $tt['stt'] . '">';
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td colspan="5">
                                    <div class="input-group">
                                        <label class="input-group-text">Sent date: </label>
                                        <input type="date" class="form-control" name="sent" value="<?= $tt['d_date'] ?>">
                                    </div>
                                </td>
                                <td colspan="2">
                                    <?php
                                    if ($tt['stt'] == 'Đã giao hàng') {
                                    ?>
                                        <div class="input-group">
                                            <label class="input-group-text">Delivery date: </label>
                                            <input type="date" readonly class="form-control" value="<?= $tt['d_day'] ?>">
                                        </div>
                                    <?php
                                    } else if ($tt['stt'] != 'Đã hủy đơn') {
                                    ?>
                                        <button type="submit" class="btn btn-primary" name="save"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                        <a class="btn btn-danger" href="?o_id=<?= $o_id ?>&id=<?= $id ?>" role="button"><i class="fa-solid fa-trash-can"></i> Cancel</a>
                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php } ?>
        </div>
        <div class="col-md-12 mt-1 align-items-center bg-info bg-gradient p-2">
            <div class="row">
                <div class="col-md-2">
                    Payment: <?php echo $details['payment']; ?>
                </div>
                <div class="col-md-3">
                    Processing-fee: <?php echo number_format($details['process']); ?> VND
                </div>
                <div class="col-md-2">
                    Total: <?php echo number_format($total + $details['process']); ?> VND
                </div>
                <div class="col-md-3">
                    <form action="" method="POST">
                        <label for="">Deposited:</label>
                        <input type="number" name="deposit" value="<?= $details['deposit'] ?>" style="width:30%;">
                        <button type="submit" class="btn btn-primary" name="sub">VND <i class="fa-solid fa-money-bills"></i></button>
                    </form>
                </div>
                <div class="col-md-2">
                    Need paid:<?php echo number_format($total + $details['process'] - $details['deposit']) ?> VND
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once("control/end.php");

?>