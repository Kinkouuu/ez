<?php
require_once("layout/sidebar.php");
?>
<div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">New Products</span></h2>
</div>
<div class="container-fluid mx-1">
    <div class="col-md-12">
        <div class="row">

            <?php
            $products = $db->query("SELECT * FROM (`product` INNER JOIN `price` ON `price`.p_id = `product`.p_id) INNER JOIN `money` ON `money`.m_id = `price`.m_id ");
            foreach ($products as $product) {
            ?>
                <div class="col-md-2 m-auto product-item p-3 border rounded bg-light" style="height: 20rem;">
                    <!-- <div class="row"> -->
                        <a href="?action=thongtinsanpham&p_id=<?= $product['p_id'] ?>" class="btn btn-sm text-dark p-0">
                            <div class="col-md-12 product-img position-relative overflow-hidden bg-transparent p-1">
                                <img class="img-fluid" src="<?= $product['p_img'] ?>" alt="" style="width:100%">
                            </div>
                            <div class="col-md-12 text-center border-top">
                                <h6 style="height:3rem"><?= $product['p_name'] ?></h6>
                                <h6><?= number_format($product['p_stock']) . " " . $product['sign'] ?></h6>
                            </div>
                        </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>