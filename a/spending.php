<?php
require_once 'control/head.php';
require_once 'control/sidebar.php';
?>

<!-- Content Header (Page header) -->
<?php
$users = $db->query("SELECT * FROM `user` ORDER BY `u_id` ASC"); //ds nguoi dung da dang ky

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

        <div class="card-body p-0">
            <div class="d-flex justify-content-between">
                <!-- <form class="select d-flex" method="GET">
                    <p>User have ordered: <input type="number" min="0" name="times"> times </p>
                    <input type="submit" name="submit" value="✔">
                </form> -->
                <button id="export">Export to CSV</button>
            </div>
            <?php if (isset($_GET['submit'])) {
                $times = $_GET['times'];
            } else {
                $times = '';
            }
            ?>
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
                        <th  style="width: 20%">
                            Address
                        </th>
                        <th  style="width: 9%">
                            Order amount
                        </th>
                        <th  style="width: 10%">
                            Products quantity
                        </th>
                        <th  style="width: 8%">
                            Service-fee
                        </th>
                        <th  style="width: 8%">
                            Ship-fee
                        </th>
                        
                        <th  style="width: 14%">
                            Total purchase amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        $u_id = $user['u_id'];
                    ?>
<tr>
<td>
                        <?= $u_id ?>
                        </td>
                        <td>
                            <?= $user['f_name'] . " " . $user['l_name'] ?>
                        </td>
                        <td>
                            <?= $user['phone'] ?>
                        </td>
                        <td>
                            <?= $user['no'] . "-" .$user['street'] . "-" .$user['ward'] . "-" .$user['district'] . "-" .$user['city']?>
                        </td>

                    <?php
                    // tong don hang + phi dich vu
                    $dh = $db->query("SELECT count(o_id) as sdh, sum(process) as pdv FROM `order` WHERE `order`.u_id = '$u_id'")->fetch(); 
                    // tong san pham + phi ship
                    $ttdh = $db->query("SELECT sum(amount) as ssp, sum(fee) as ps FROM `order` INNER JOIN  `details` ON `order`.o_id = `details`.o_id  WHERE `order`.u_id = '$u_id' AND `details`.stt != 'Đã hủy đơn'")->fetch();
                    //tong tien mua hang
                    $tt = $db->query("SELECT * FROM `order` INNER JOIN `details` ON `order`.o_id = `details`.o_id  WHERE `order`.u_id = '$u_id' AND `details`.stt != 'Đã hủy đơn'");
                    $tdh =0; // tong gia tri don hang    
                    foreach($tt as $row){
                            $tth = $row['amount'] * $row['d_price']; // tong tien hang
                            if($row['s_id'] != 0){ // check cai ma giam gia ko
                                $s_id = $row['s_id'];
                                $sale = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
                                $discount = $sale['discount']; // lay gia tri voucher
                                if($discount > $tth){ // giam gia nhieu hon tien mua
                                    $tdh += 0;
                                }else{// tong don hang = tien hang - giam gia
                                    $tdh += $tth - $discount;
                                }
                            }else{// ko dung voucher
                                $tdh += $tth;
                            }
                        }
                    ?>
                    <td><?= number_format($dh['sdh'])?></td>
                    <td><?= number_format($ttdh['ssp'])?></td>
                    <td><?= number_format($dh['pdv'])?></td>
                    <td><?= number_format($ttdh['ps'])?></td>
                    <td><?= number_format($tdh)?></td>
                    <?php
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
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
<?php require_once 'control/end.php';; ?>