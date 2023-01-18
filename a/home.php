<?php
require_once("control/sidebar.php");
?>
<div class="container-fluid bg-dark mt-2" style="height: 90vh;">
    <div class="col-md-12">
        <div class="row">
        <!-- small box -->
            <div class="col-md-2">
                <div class="box" style="background-color: blue;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `product`")->rowcount(); ?></h3>
                        <p>Products</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: green;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `user`")->rowcount(); ?></h3>
                        <p>Users</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: darkcyan;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `order`")->rowcount(); ?></h3>
                        <p>Orders</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: cyan;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `money`")->rowcount(); ?></h3>
                        <p>Currency Exchange</p>
                    </div>
                    <a href="money.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: lime;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `statist`")->rowcount(); ?></h3>
                        <p>Revenue Statistic</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>  

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: yellow;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `product`")->rowcount(); ?></h3>
                        <p>User's Spending</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: gold;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `cate`")->rowcount(); ?></h3>
                        <p>Category Type</p>
                    </div>
                    <a href="cate.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: orange;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `factory`")->rowcount(); ?></h3>
                        <p>Supply Factory</p>
                    </div>
                    <a href="factory.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- small box -->
                    <div class="col-md-2">
                <div class="box" style="background-color: pink;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `sale`")->rowcount(); ?></h3>
                        <p>Voucher Discount</p>
                    </div>
                    <a href="sale.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
                                <!-- small box -->
                                <div class="col-md-2">
                <div class="box" style="background-color:Crimson;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `gb`")->rowcount(); ?></h3>
                        <p>Start Soucing</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                                <!-- small box -->
                                <div class="col-md-2">
                <div class="box" style="background-color:White;">
                    <div class="inner">
                        <h3><?php echo $db->query("SELECT * FROM `history`")->rowcount(); ?></h3>
                        <p>Operation History</p>
                    </div>
                    <a href="product.php" class="small-box-footer" style="text-decoration: none;">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once("control/end.php");
?>