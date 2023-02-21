<?php
require_once("layout/sidebar.php");
if(isset($_GET['loai'])){
    $type = $_GET['loai'];
    $dk = "`cate`.type= '$type'";
    $title = 'LOẠI SẢN PHẨM: '. $type;
}
else if(isset($_GET['tensanpham'])){
    $ten = $_GET['tensanpham'];
    $dk = "`p_name` LIKE '%$ten%'";
    $title = 'TÌM KIẾM SẢN PHẨM: '. $ten;
}
?>
<style>
#p_info{
    height: 23rem;
    position: relative;
}
@media only screen and (max-width: 600px) {
    #p_info{
    height: 25rem;
    position: relative;
}
}
</style>
<div class="text-center m-4">
    <h2 class="section-title px-5 text-uppercase "><span class="px-2"><?= $title?></span></h2>
</div>
<div class="container-fluid mx-1">
    <div class="col-md-12">
        <div class="row">

            <?php
            $products = $db->query("SELECT * FROM ((`product` INNER JOIN `price` ON `price`.p_id = `product`.p_id) INNER JOIN `money` ON `money`.m_id = `price`.m_id) INNER JOIN `cate` ON `product`.c_id = `cate`.c_id WHERE $dk ORDER BY `product`.remain DESC");
                if($products->rowCount() > 0){
                    foreach ($products as $product) {
                        ?>
                            <div class="col-md-2 m-auto product-item p-3 border rounded bg-light" id="p_info">
                                <!-- <div class="row"> -->
                                    <a href="?action=thongtinsanpham&p_id=<?= $product['p_id'] ?>" class="btn btn-sm text-dark p-0">
                                        <div class="col-md-12 product-img position-relative overflow-hidden bg-transparent p-1" style="height:80%;position: absolute;top: 10px;">
                                            <img class="img-fluid" src="<?= $product['p_img'] ?>" alt="" style="width:100%">
                                        </div>
                                        <div class="text-center justify-content-center border-top" style="height:20%;position: absolute;bottom: 0px;margin:auto;width:90%">
                                            <strong style="height:3rem;text-align:center"><?= $product['p_name'] ?></strong>
                                            <h6><?= number_format($product['p_stock']) . " VND" ?></h6>
                                            <?php
                                                if($product['remain'] == 0){
                                                    echo '<p class="alert alert-danger text-center p-0 w-100">
															<a href="?action=homthugopy">Liên hệ để nhập hàng.</a>
														</p> ';
                                                }
                                            ?>
                                        </div>
                                    </a>
                            </div>
                        <?php
                        }
                }else{
                    ?>
                    <div class="col-md-8  m-auto text-center">
                        <img src="img/empty.png" alt="" style="width: 70%;">
                    </div>
                    <?php
                }
            ?>


        </div>
    </div>
</div>