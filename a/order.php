<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order</h3>
            <a href="viewOrder.php" class="btn btn-outline-success"><i class="fa-solid fa-memo-circle-info"></i>View all</a>
        </div>
        <div class="card-body p-0 overflow-auto">
            <table class="table table-striped  table-hover" id="dataList">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Product
                        </th>
                        <th>
                            Provisional
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            City
                        </th>
                        <th>
                            Order Date
                        </th>
                        <th>Note</th>
                        <th>
                            Processing        
                        </th>
                        <th>
                            Payment
                        </th>
                        <th>
                            Total
                        </th>
                        <th>
                            Deposit
                        </th>
                        <th>
                            Need Paid
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $order = $db->query("SELECT * FROM `order` ORDER BY `order`.o_id DESC"); // lay thong tin dat hang
                    foreach ($order as $o) {
                        $o_id = $o['o_id'];
                        $sum = 0;
                    ?>
                        <tr>
                            <td>
                                #<?= $o_id ?>
                            </td>
                            <td colspan="3">
                                <table class="table table-bordered text-center">
                                    <?php
                                    $detail = $db->query("SELECT * FROM `details` INNER JOIN `product` ON `details`.p_id = `product`.p_id WHERE `details`.o_id = '$o_id' ");
                                    foreach ($detail as $d) { // thông tin chi tiet don hang
                                        $id = $d['id'];

                                    ?>

                                        <tr>
                                            <td style="margin: 0; padding: 0">
                                                    <?php echo $id ?>
                                            </td>
                                            <td style="margin: 0; padding: 0">
                                                <?php echo $d['p_name'] ?>
                                            </td>
                                            <!-- <td>
                                        <?php echo number_format($d['amount']) ?>
                                        </td>
                                        <td>
                                        <?php echo number_format($d['d_price']) ?>
                                        </td>
                                        <td>
                                        <?php echo number_format($d['fee']) ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($d['s_id'] == 0) {
                                                $discount = 0;
                                            } else {
                                                $s_id = $d['s_id'];
                                                $sale = $db->query("SELECT * FROM `sale` WHERE `s_id` = $s_id")->fetch();
                                                $discount = $sale['discount'];
                                            }
                                            echo number_format($discount);
                                            ?>
                                        </td> -->
                                            <td style="margin: 0; padding: 0">
                                                <?php
                                                $tmp = $d['amount'] * $d['d_price'] + $d['fee'] - $discount;
                                                if($tmp <0 || $d['stt'] == "Đã hủy đơn"){
                                                    $provi = 0;
                                                }else{
                                                    $provi =$tmp;
                                                }
                                                $sum += $provi; // tong gia tri tung chi tiet don hang
                                                echo number_format($provi) . " VND";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>

                            <td>
                                <?= $o['o_name'] ?>
                            </td>
                            <td>
                                <?= $o['o_phone'] ?>
                            </td>
                            <td>
                                <?= $o['o_no'] . " - " . $o['o_street'] . " - " . $o['o_ward'] . " - " . $o['o_district'] ?>
                            </td>
                            <td>
                                <?= $o['o_city'] ?>
                            </td>
                            <td>
                                <?= $o['o_date'] ?>
                            </td>
                            <td>
                                <?= $o['note'] ?>
                            </td>
                            <td>
                                <?= number_format($o['process']) . " VND" ?>
                            </td>
                            <td>
                                <?= $o['payment'] ?>
                            </td>
                            <td>
                                <?php $total = $sum + $o['process'];
                                echo number_format($total) . " VND" ?>
                            </td>
                            <td>
                                <?= number_format($o['deposit']) . " VND" ?>
                            </td>
                            <td>
                                <?php
                                echo number_format($total - $o['deposit']) . " VND"
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="details.php?o_id=<?= $o_id; ?>">
                                    <i class="fas fa-file-pen"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
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