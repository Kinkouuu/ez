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

                            // echo $u_id;
                            $bought = $db->query("SELECT `user`.u_id,count(`order`.o_id) as sdh,sum(process) as pdv FROM `order` INNER JOIN `user`ON `order`.u_id=`user`.u_id WHERE `user`.u_id = '$u_id'")->fetch();
                            if ($bought['sdh'] == $times || $times == "") { // lay u_id da dat times lan
                                $n_u += 1; //+1 thang neu tm dieu kien so luong don
                                $n_pf += $bought['pdv'];
                                $n_o += $bought['sdh'];
                                // echo $bought['u_id']. ' = ' . $bought['sdh']. ' = ' . $bought['pdv'] ."<br/>";
                                $tmp = $db->query("SELECT `user`.*, sum(`details`.amount) as ssp, sum(`details`.fee) as sts,sum(`details`.amount*`details`.d_price) as sth FROM `user`, `order`,`details` WHERE `user`.u_id = `order`.u_id AND `details`.o_id = `order`.o_id AND `user`.u_id = '$u_id' AND `details`.stt != 'Đã hủy đơn';")->fetch(); // thong tin don hang

                                // echo $u_id ." = " . $tmp['sts'] ."</br>"; // so san pham tuong duong
                                $n_p += $tmp['ssp'];
                                $n_sf += $tmp['sts'];
                                $n_m += $tmp['sth'];
                        ?>
                                <tr>
                                    <td>
                                        <?= $tmp['u_id'] ?>
                                    </td>
                                    <td>
                                        <?= $tmp['f_name'] . " " . $tmp['l_name'] ?>
                                    </td>
                                    <td>
                                        <?= $tmp['phone'] ?>
                                    </td>
                                    <td>
                                        <?= $tmp['no'] . "-" . $tmp['street'] . "-" . $tmp['ward'] . "-" . $tmp['district'] . "-" . $tmp['city'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($bought['sdh']) ?>
                                    </td>
                                    <td>
                                        <?= number_format($tmp['ssp']) ?>
                                    </td>
                                    <td>
                                        <?= number_format($bought['pdv']) ?>
                                    </td>
                                    <td>
                                        <?= number_format($tmp['sts']) ?>
                                    </td>
                                    <td>
                                        <?= number_format($tmp['sth']) ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        // echo "tong so don hang: " .$n_o;
                        // echo "tong tien ship:" . $n_sf ;
                        // echo "tong tien phi dv:" . $n_pf ;
                        // echo "tong san pham: " . $n_p;
                        // echo "tong nguoi mua: "$n_u;/ so nguoi dung ruong duong

                        ?>
                        <tr class="table table-primary">
                            <td colspan="4">Total: </td>
                            <td><?= number_format($n_o) ?></td>
                            <td><?= number_format($n_p) ?></td>
                            <td><?= number_format($n_pf) ?></td>
                            <td><?= number_format($n_sf) ?></td>
                            <td><?= number_format($n_m) ?></td>
                        </tr>
                        <tr class="table table-info">
                            <td colspan="4">Average: </td>
                            <td><?= number_format($n_o / $n_u, 2, '.', ',') ?></td>
                            <td><?= number_format($n_p / $n_u, 2, '.', ',') ?></td>
                            <td><?= number_format($n_pf / $n_u, 2, '.', ',') ?></td>
                            <td><?= number_format($n_sf / $n_u, 2, '.', ',') ?></td>
                            <td><?= number_format($n_m / $n_u, 2, '.', ',') ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
       
            </div> </div>

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