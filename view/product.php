<?php

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
}

?>
<div class="container mt-5">

    <div class="row">
        <div class="col-md-6 ">
            <?php
            $p_id = mget('p_id');
            $product = $db->query("SELECT * FROM (`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id WHERE `product`.p_id = $p_id")->fetch();
            $sold = $db->query("SELECT sum(amount) as sold FROM `details` WHERE `p_id` = $p_id")->fetch();
            ?>
            <div class="images">
                <img src="<?= $product['p_img'] ?>" class="d-block w-100" alt="...">
            </div>

        </div>
        <div class="col-md-6 ">
            <?php
            if (isset($_GET['ktra'])) {
                echo '<small class ="form-text" style="color:red;">' . $_GET['ktra'] . '</small>';
            }
            ?>
            <form action="process/xl_addcart.php" method="POST">
                <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">

                <div class="d-flex">
                    <div class="col-sm-4">
                        <p class="name_product"><strong>Tên sản phẩm: </strong>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $product['p_name'] ?></p>
                    </div>

                </div>




                <!-- dat hang co san  -->
                <!-- //con hang  hay ko -->
                <?php
                if ($product['remain'] > 0) {
                ?>
                    <div class="d-flex">
                        <div class="col-sm-4">
                            <p class="price_product"> <strong>Giá hàng có sẵn: </strong>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                echo $product['p_stock'] . ' VND';


                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class="col-sm-4">
                            <p><strong>Số lượng đặt hàng: </strong></p>
                        </div>

                        <div class="col-sm-9 d-flex justify-content-start">
                            <div class="ms-1 me-1">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    $u_id = $_SESSION['user'];
                                    $sl = $db->query("SELECT * FROM `cart` WHERE `u_id` = '$u_id' AND `p_id` = '$p_id'");
                                    if ($sl->rowCount() > 0) {
                                        $sll = $sl->fetch();
                                        $unit = $sll['unit'];
                                        $book = $sll['book'];
                                    } else {
                                        $unit = 0;
                                        $book = 0;
                                    }
                                } else {
                                    $unit = 0;
                                    $book = 0;
                                }
                                ?>
                                <input aria-label="quantity" class="quanty_product" max="<?= $product['remain'] ?>" min="0" name="unit" type="number" value="<?= $unit ?>">
                            </div>
                            <p> / <?php echo $product['remain'] ?></p>
                        </div>
                    </div>
                <?php 
            }  
            ?>
                <!-- dat hang group by -->
                <!-- // co nam trong danh sach group by ko -->
                <?php
                $today = strtotime(date('Y-m-d H:i:s'));
                $product1 = $db->query("SELECT * FROM ((( `product` INNER JOIN `price` ON `product`.p_id = `price`.p_id)INNER JOIN `money` ON `price`.m_id = `money`.m_id) INNER JOIN `gb_list` ON `product`.p_id = `gb_list`.p_id) INNER JOIN `gb` ON `gb_list`.g_id = `gb`.g_id WHERE '$today' BETWEEN `gb`.s_date AND `gb`.e_date AND `product`.p_id = $p_id");
                if ($product1->rowCount() > 0) {
                    $product2 = $product1->fetch();
                    $g_id = $product2['g_id'];
                ?>
                    <div class="d-flex">
                        <div class="col-sm-4">
                            <p class="price_product"> <strong>Giá hàng Group by: </strong>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                if ($product['sign'] == 'VND') {
                                    echo $product['p_gb'] * $product['ex'] . ' VND';
                                } else {
                                    echo $product['p_gb'] ?> <?php echo $product['sign'] . '≈' . number_format($product['p_gb'] * $product['ex']) . ' VND';
                                                }
                                                    ?>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-4">
                            <p><strong>Số lượng đặt trước: </strong></p>
                        </div>
                        <div class="col-sm-9">
                            <div class="ms-1 me-1">
                                <input aria-label="quantity" class="quanty_product" min="0" name="book" type="number" value="<?= $book ?>">
                            </div>
                        </div>
                    </div>
                    <p style="color:red">Group by sẽ đóng vào ngày: <?php echo date("d-m-Y", $product2['e_date']) ?></p>
                    <?php
                    $pre = $db->query("SELECT sum(amount) as tong FROM `details` WHERE `g_id` = '$g_id'")->fetch();
                    ?>
                    <p style="color:blue"><?php echo $pre['tong'] ?> sản phẩm đã được đặt trước</p>
                <?php
                }
                ?>
                <?php
                if ($product['remain'] == 0 && $product1->rowCount() == 0) {
                ?>
                    <input type="submit" class="btn btn-outline-danger" disabled value="Đã hết hàng">
                <?php
                } else {

                ?>
                    <button type="submit" name="addCart" class="btn btn-outline-primary">
                        <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                <?php
                }
                ?>

                <div class="d-flex justify-content-start">
                    <p><strong>Đã bán: </strong> <?php echo $sold['sold'] ?> sản phẩm</p>
                </div>
                <div class="p_info border border-end-0" style="max-height:240px;overflow-y:scroll">
                    <p><strong>Mô tả sản phẩm: </strong>
                        <?php
                        $str = $product['specs'];
                        $dump = explode('-', $str);
                        for ($x = 0; $x < sizeof($dump); $x++) {
                            echo $dump[$x] . "<br />";
                        }
                        ?>
                    </p>
                </div>
            </form>
            <?php
            $f_id = $product['f_id'];
            $ncc = $db->query("SELECT * FROM `factory` WHERE `f_id` = '$f_id'")->fetch();
            ?>
            <h5>Sản xuất bởi: <?= $ncc['f_name'] ?></h5>
            <?php if ($ncc['represent'] != '') {
            ?>
                <h5>Đại diện phân phối tại Việt Nam: <?= $ncc['represent'] ?></h5>
            <?php }
            ?>
            <?php if ($product['video'] != '') {
            ?>
                <a href="<?= $product['video']; ?>"><strong>Link video tham khảo.</strong></a>
            <?php }
            ?>
        </div>
    </div>

</div>