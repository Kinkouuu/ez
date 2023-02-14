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
                <div class="col-md-2 mx-auto product-item p-3">
                    <div class="row">
                        <div class="col-md-12 product-img position-relative overflow-hidden bg-transparent">
                            <img class="img-fluid" src="<?= $product['p_img'] ?>" alt="" style="width:100%">
                        </div>
                        <div class="col-md-12 text-center ">
                            <h6><?= $product['p_name'] ?></h6>
                            <h6><?= number_format($product['p_stock']) . " " . $product['sign'] ?></h6>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <a href="?action=thongtinsanpham&p_id=<?= $product['p_id']?>" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>
                                Chi tiết
                            </a>
                            <!-- <button class="btn btn-sm text-dark p-0" name="add">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                Chọn mua
                            </button> -->

                        </div>
                    </div>

                </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>