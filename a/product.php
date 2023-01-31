<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product | <a href="view/addProduct.php" style="text-decoration: none; color:cornflowerblue"><i class="fas fa-folder-plus"></i> ADD</a></h3>
        </div>
        <div class="card-body p-0 overflow-auto" style="overflow-x:auto;">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Picture
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Shipment
                        </th>
                        <th style="width: 120px;">
                            Price
                        </th>
                        <th>
                            Increase
                        </th>
                        <th>
                            Remain
                        </th>
                        <th>
                            Factory
                        </th>
                        <th>
                            Specification
                        </th>
                        <th>
                            Review
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $product = $db->query("SELECT * FROM ((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id ORDER BY `product`.p_id DESC");
                    foreach ($product as $pro) {
                        $p_id = $pro['p_id'];
                    ?>
                        <tr>
                            <td>
                                <?= $pro['p_id']; ?>
                            </td>
                            <td  style="width: 200px;">
                                <img src="<?= $pro['p_img']; ?>" alt="" style="width: 100%;">
                            </td>
                            <td>
                                <?= $pro['p_name']; ?>

                            </td>
                            <td>
                                - <br><?= $pro['direc']; ?> <br> -- <br><?= $pro['cate']; ?> <br> --- <br><?= $pro['type']; ?>
                            </td>
                            <td>
                                <?php 
                                    $sm_id = $pro['sm_id'];
                                    $sm = $db->query("SELECT * FROM `shipment` WHERE `sm_id` = '$sm_id'")->fetch();
                                    echo $sm['sm_code'];
                                ?>
                            </td>

                            <td>
                                            GB: <br><?= $pro['p_gb']  ?> <?= $pro['sign']; ?> <br>
                                            Stock:<br><?= $pro['p_stock'] ." VND" ?>
                            </td>
                            <td>
                                            50%: <br>+<?= $pro['p_50']; ?> VND</br>

                                            10%: <br>+<?= $pro['p_10']; ?> VND</br>
                            </td>
                            <td>
                                <?= $pro['remain']; ?>
                            </td>
                            <td>
                            <?php
                            $f_id = $pro['f_id'];
                            // echo $f_id;
                            $fact = $db->query("SELECT * FROM `factory` WHERE `f_id` = '$f_id'")->fetch();
                            echo $fact['f_name']; ?>
                            </td>
                            <td style="line-height: 1 ;">
                                <?php 
                                $str = $pro['specs'];
                    $dump = explode('-', $str);
                    for ($x = 1; $x < sizeof($dump); $x++) {
                        echo "- ".  $dump[$x] . "<br>";
                    } ?>
                            </td>
                            <td>

                                <a href="<?= $pro['video']; ?>" class="link-primary"><?= $pro['video']; ?></a>

                            </td>

                            <td class="project-actions text-center">
                                <a class="btn btn-primary btn-sm" href="view/upProduct.php?p_id=<?= $pro['p_id']; ?>">
                                    ✎
                                </a>
                                <a class="btn btn-danger btn-sm" href="?del=<?= $pro['p_id']; ?>">
                                    ✖
                                </a>
                            </td>
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