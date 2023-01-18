<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Voucher Discount | <a href="view/addSale.php" style="text-decoration: none; color:cornflowerblue">ADD</a></h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Voucher code</th>
                        <th scope="col">Discount</th>
                        <th scope="col">User can use</th>
                        <th scope="col">Use for product</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sales = $db->query("SELECT * FROM `sale` ORDER BY `s_id` DESC");

                    foreach ($sales as $sale) {
                        $s_id = $sale['s_id'];
                        $user = $db->query("SELECT  `u_id` FROM `sale_user` WHERE `s_id` = '$s_id'")->rowCount();
                        $product = $db->query("SELECT  `p_id` FROM `sale_product` WHERE `s_id` = '$s_id'")->rowCount();
                    ?>
                        <tr>
                            <td><?= $s_id ?></td>
                            <td><?= $sale['code'] ?></td>
                            <td><?= number_format($sale['discount']) ?> VND</td>
                            <td><?= $user ?></td>
                            <td><?= $product ?></td>
                            <td><a href="view/addSaleList.php?s_id=<?= $s_id ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once("control/end.php");
?>