<?php
require_once("layout/sidebar.php");
$today = strtotime(date('Y-m-d H:i:s'));
?>
<div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Đang mở group buy</span></h2>
</div>
<div class="container-fluid mx-1">
    <div class="col-md-12">
        <div class="row">
            <?php
            $products = $db->query("SELECT * FROM (((`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id) INNER JOIN `gb_list` ON `product`.p_id = `gb_list`.p_id) INNER JOIN `gb` ON `gb_list`.g_id = `gb`.g_id WHERE '$today' BETWEEN `gb`.s_date AND `gb`.e_date");
            foreach ($products as $product) {
            ?>
                <div class="col-md-2 m-auto product-item p-3 border rounded bg-light" style="min-height: 25rem;position: relative;">
                    <!-- <div class="row"> -->
                        <a href="?action=thongtinsanpham&p_id=<?= $product['p_id'] ?>" class="btn btn-sm text-dark p-0">
                            <div class="col-md-12 product-img position-relative overflow-hidden bg-transparent p-1" style="height:80%;position: absolute;top: 10px;">
                                <img class="img-fluid" src="<?= $product['p_img'] ?>" alt="" style="width:100%">
                            </div>
                            <div class="text-center justifu-content-center border-top" style="height:20%;position: absolute;bottom: 0px;margin:auto;width:90%">
                                <strong style="height:3rem;text-align:center"><?= $product['p_name'] ?></strong>
                                <h6><?= number_format($product['p_gb'] * $product['ex'] * $product['factor']) . " VND" ?></h6>
                            </div>
                        </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>