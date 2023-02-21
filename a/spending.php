<?php
require_once 'control/head.php';
require_once 'control/sidebar.php';
?>

<!-- Content Header (Page header) -->
<?php
$users = $db->query("SELECT * FROM `user` ORDER BY `u_id` ASC"); //ds nguoi dung da dang ky
$n_u = 0; // so nguoi dung thoa man dieu kien
$n_o = 0; // so don hang
$n_p = 0; // so luong san pham da mua
$n_pf = 0; //tien phi dich vu
$n_sf = 0; //tien ship
$n_m = 0; // so tien mua hang

?>

<!-- Main content -->
<section class="content">
    <strong>Registered users: <?php echo $users->rowCount() ?></strong><br>
    <strong>Number of users have ordered: <?php echo $db->query("SELECT DISTINCT `u_id` FROM `order`")->rowCount() ?></strong>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User's spending</h3> <br>
        </div>
        <div class="col-md-12">
            <div class="row justify-content-center">

                <?php
                $max = 0; // so lan mua hang lon nhat
                foreach ($users as $user) {
                    $uid = $user['u_id'];
                    // tong don hang + phi dich vu
                    $bought = $db->query("SELECT count(o_id) as sd FROM `order` WHERE `u_id`= '$uid'"); // so luong mua hang cua nguoi dung

                    foreach ($bought as $buy) {
                        if ($max < $buy['sd']) {
                            $max = $buy['sd'];
                        } else {
                            $max = $max;
                        }
                    }
                }

                if (isset($_POST['submit'])) {
                    $times = post('times');
                    // echo $times;
                } else {
                    $times = "";
                }
                ?>
                <div class="col-sm-10 d-flex justify-content-between">
                    <div class="col-sm-4">
                        <form class="select d-flex" method="POST">
                            <label>Number of orders by user: </label>
                            <input type="number" min="0" max="<?= $max ?>" name="times" value="<?= $times ?>" class="border border-end-0" style="width: 30%;">

                            <button type="submit" name="submit" class="border border-0 bg-secondary bg-opacity-25"><i class="fa-brands fa-searchengin"></i></button>
                        </form>
                    </div>
                    <button class="btn btn-outline-success" id="export"><i class="fa-solid fa-file-export"></i> Export</button>
                </div>
                <div class="col-sm-12">

                    <table class="table table-striped projects" id="dataList">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 10%">
                                    User name
                                </th>
                                <th style="width: 10%">
                                    Phone number
                                </th>
                                <th style="width: 21%">
                                    Address
                                </th>
                                <th style="width: 9%">
                                    Order amount
                                </th>
                                <th style="width: 10%">
                                    Products quantity
                                </th>
                                <th style="width: 8%">
                                    Service-fee
                                </th>
                                <th style="width: 8%">
                                    Ship-fee
                                </th>
                                <th style="width: 13%">
                                    Total purchase amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = $db->query("SELECT * FROM `user` ORDER BY `u_id` ASC"); //ds nguoi dung da dang ky
                            foreach ($users as $us) {
                                $u_id = $us['u_id'];
                                // tong don hang + pdv
                                $orders = $db->query("SELECT user.*,count(o_id) as sdh,sum(process) as pdv FROM `order`, `user` WHERE `order`.u_id = `user`.u_id AND `user`.u_id = '$u_id'");
                                // thong tin don hang
                                foreach ($orders as $order) {

                                    // lay thong tin khach dat `times` don hang
                                    if ($order['sdh'] == $times || $times == '') {
                                        $n_u += 1; //so nguoi dung TMDK + 1
                                        $n_o += $order['sdh']; // cap nhat tong so don hang
                                        $n_pf += $order['pdv']; // cap nhat tong tien pdv
                                        $u_id = $order['u_id'];
                                        
                            ?>
                                        <tr>
                                            <td><?= $order['u_id'] ?></td>
                                            <td><?= $order['f_name'] . " " . $order['l_name'] ?></td>
                                            <td><?= $order['phone'] ?></td>
                                            <td>
                                                <?= $order['no'] . "-" . $order['street'] . "-" . $order['ward'] . "-" . $order['district'] . "-" . $order['city'] ?>
                                            </td>
                                            <td><?= number_format($order['sdh']) ?></td>

                                            <?php
                                            $details = $db->query("SELECT * FROM `user`,`order`,`details` WHERE `user`.u_id = `order`.u_id AND `order`.o_id = `details`.o_id   AND `user`.u_id = '$u_id'");
                                            $ssp = 0; //tinh tong san pham da mua
                                            $sts = 0; //tinh tong tien ship
                                            $tdh = 0; //tinh tong tien cac don hang
                                            foreach ($details as $detail) {
                                                $ssp += $detail['amount'];// cap nhat tong so san pham theo tung nguoi dung
                                                $n_p += $detail['amount']; // cap nhat tong so san pham tat ca nguoi dung TMDK
                                                $sts += $detail['fee']; //cap nhat tong so tien ship phai tra theo tung nguoi dung
                                                $n_sf += $detail['fee']; //cap nhat tong so tien ship thu cua khach hang TMDK
                                                $sth = $detail['amount'] * $detail['d_price']; // so tien hang cua tung don hang
                                                $dh = 0;
                                                // tong tien cac don hang += tien tung don thanh phan
                                                    if($detail['stt'] != 'Đã hủy đơn'){
                                                        if ($detail['s_id'] == 0) {
                                                            $tdh = $tdh + $sth + $detail['fee']; // cong tong tien don thanh phan
                                                            
                                                        } else {
                                                            $s_id = $detail['s_id'];
                                                            $sale = $db->query("SELECT `discount` FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
                                                            if ($sale['discount'] < $sth) { //neu tien giam gia < tien don hang
                                                                $dh = $sth + $detail['fee'] - $sale['discount'];
                                                                
                                                            } else  { //neu tien giam gia > tien don hang
                                                                $dh = 0 + $detail['fee'];
                                                            }
                                                            $tdh += $dh;// Tinh tien mua hang theo tung nguoi dung
        
                                                        }
                                                    }else{
                                                        $tdh += 0;
                                                    }
                                                
                                            }
                                            $n_m += $tdh+ $order['pdv']; // tinh tong tat ca don hang cua nguoi dung TMDK
                                            ?>
                                            <td><?= number_format($ssp) ?></td>
                                            <td><?= number_format($order['pdv']) ?></td>
                                            <td><?= number_format($sts) ?></td>
                                            <td><?= number_format($tdh + $order['pdv']) ?></td>
                                        </tr>
                            <?php

                                    }
                                }
                            }
                            ?>
                            </tr>
                            <tr>
                                <td colspan="4">Total</td>
                                <td><?= number_format($n_o) ?></td>
                                <td><?= number_format($n_p) ?></td>
                                <td><?= number_format($n_pf) ?></td>
                                <td><?= number_format($n_sf) ?></td>
                                <td><?= number_format($n_m) ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">Average:</td>
                                <td><?= number_format($n_o/$n_u,2,'.',',') ?></td>
                                <td><?= number_format($n_p/$n_u,2,'.',',') ?></td>
                                <td><?= number_format($n_pf/$n_u,2,'.',',') ?></td>
                                <td><?= number_format($n_sf/$n_u,2,'.',',') ?></td>
                                <td><?= number_format($n_m/$n_u,2,'.',',') ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>
<script>
    document.getElementById('export').addEventListener('click', function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#dataList"));
    });
</script>
<!-- /.content-wrapper -->
<?php require_once 'control/end.php'; ?>