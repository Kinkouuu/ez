<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
$sm_id = get('sm_id');
$sm = $db->query("SELECT * FROM `shipment` INNER JOIN `factory` ON `shipment`.f_id = `factory`.f_id WHERE `sm_id` = '$sm_id'")->fetch();
$f_id = $sm['f_id'];
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3">
            <h3>Shipment ID: <?= $sm_id ?></h3>

        </div>
        <div class="col-md-4">
            <h3>Supply factory: <?= $sm['f_name'] ?></h3>
        </div>
        <div class="col-md-3">
            <h3>Shipment code: <?= $sm['sm_code'] ?></h3>
        </div>
        <div class="col-md-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fa-solid fa-file-circle-plus"></i> Add product
            </button>

            <!-- Modal -->
            <form action="../model/prs_addSMList.php" method="post">
                <input type="hidden" name="sm_id" value="<?= $sm_id ?>">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="staticBackdropLabel"><?php echo "<p> Thêm sản phẩm của công ty <span style='color:blue'>" . $f_id . "-" . $sm['f_name'] . " </span> cho lô hàng <span style='color:blue'>#" . $sm_id . "-" . $sm['sm_code'] . "</span></p>" ?></h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pro = $db->query("SELECT * FROM ((`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id) INNER JOIN `cate` ON `product`.c_id = `cate`.c_id WHERE `product`.f_id ='$f_id' AND `product`.p_id NOT IN (SELECT `p_id` FROM `sm_list` WHERE `sm_id` = '$sm_id')");
                                        foreach ($pro as $row) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $row['p_id'] ?>
                                                </td>
                                                <td style="width: 12%;">
                                                    <img src="<?= $row['p_img'] ?>" alt="" width="100%">
                                                </td>
                                                <td>
                                                    <?= $row['p_name'] ?>
                                                </td>
                                                <td>
                                                    <table class="table table-striped table-hover d-flex justify-content-center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="d-flex">
                                                                    GB: <br> <?= $row['p_gb'];  ?> <?= $row['sign']; ?> </br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Stock: <br><?= $row['p_stock']; ?> VND</br>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class="border-0">
                                                            <tr>
                                                                <td>
                                                                    50%: <br>+<?= $row['p_50']; ?> VND</br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    10%: <br>+<?= $row['p_10']; ?> VND</br>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td><?= $row['type'] ?></td>
                                                <td><?= $row['cate'] ?></td>
                                                <td>
                                                    <input type="checkbox" class="form-check-input" name="addSP[]" value="<?= $row['p_id'] ?>" id="">
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 mt-2 ">
            <?php
            $sm_list = $db->query("SELECT * FROM `sm_list` WHERE `sm_id` = '$sm_id' ORDER BY `p_id`");
            foreach ($sm_list as $row) {
                $p_id = $row['p_id'];
                $sm_id = $row['sm_id'];
                $m_id = $row['m_id'];
                $sp = $db->query("SELECT * FROM `product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id WHERE `p_id` = '$p_id' ")->fetch();
            ?>
                <form action="../model/prs_addSMList.php" method="post" class="border p-2 d-flex justify-items-center">
                    <input type="hidden" name="sm_id" value="<?= $sm_id ?>">
                    <a href="../view/upProduct.php?p_id=<?= $p_id ?>" class="col-sm-2 d-flex align-items-center text-decoration-none me-2">
                        <div style="width: 40%;">
                            <div class="d-flex">
                                <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">
                                <label for="">#</label>
                                <?= $p_id ?>
                            </div>
                            <?= $sp['p_name'] ?>
                        </div>
                        <div class="div" style="width: 60%;">
                            <img src="<?= $sp['p_img'] ?>" alt="" style="width: 100%;">
                        </div>
                    </a>
                    <div class="col-sm-3 me-4">
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 28%;">Import price: </label>
                            <input type="number" step=".01" class="form-control" name="sm_price" style="width: 50%;" min="0" value="<?= $row['sm_price'] ?>">
                            <select name="m_id" class="form-select" id="" style="width: 22%;">
                                <?php
                                if ($m_id == 0) {
                                    $money = $db->query("SELECT * FROM `money` ORDER BY `m_id` ASC");
                                    foreach ($money as $m) {
                                ?>
                                        <option value="<?= $m['m_id'] ?>"><?= $m['sign'] ?></option>
                                    <?php
                                    }
                                } else {
                                    $tmp = $db->query("SELECT * FROM `money` WHERE `m_id` = '$m_id'")->fetch();
                                    ?>
                                    <option selected value="<?= $tmp['m_id'] ?>"><?= $tmp['sign'] ?></option>
                                    <?php
                                    $money = $db->query("SELECT * FROM `money` WHERE `m_id` != '$m_id'");
                                    foreach ($money as $m) {
                                    ?>
                                        <option value="<?= $m['m_id'] ?>"><?= $m['sign'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 28%;">Exchange: </label>
                            <input type="number" class="form-control" name="ex_price" style="width: 50%;" min="0" value="<?= $row['ex_price'] ?>">
                            <span class="input-group-text" id="basic-addon2" style="width: 22%;">VND</span>
                        </div>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 40%;">Import quantity: </label>
                            <input type="number" class="form-control" name="sm_amount" style="width: 60%;" min="0" value="<?= $row['sm_amount'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-2 me-4">
                        <h4 class="mt-0 mb-3">Shipping cost:</h4>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 30%;">Oversea: </label>
                            <input type="number" class="form-control" name="gate_ship" style="width: 50%;" min="0" value="<?= $row['gate_ship'] ?>">
                            <span class="input-group-text" id="basic-addon2" style="width: 20%;">VND</span>
                        </div>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 30%;">Domestic: </label>
                            <input type="number" class="form-control" name="hn_ship" style="width: 50%;" min="0" value="<?= $row['hn_ship'] ?>">
                            <span class="input-group-text" id="basic-addon2" style="width: 20%;">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-2 me-4">
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 40%;">Booking on: </label>
                            <input type="date" class="form-control" name="sm_date" style="width: 60%;" value="<?= $row['sm_date'] ?>">
                        </div>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 40%;">Payment on: </label>
                            <input type="date" class="form-control" name="pay_date" style="width: 60%;" min="<?= $row['sm_date'] ?>" value="<?= $row['pay_date'] ?>">
                        </div>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 40%;">Sent on: </label>
                            <input type="date" class="form-control" name="ex_date" style="width: 60%;" min="<?= $row['sm_date'] ?>" value="<?= $row['ex_date'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 40%;">Import on: </label>
                            <input type="date" class="form-control" name="im_date" style="width: 60%;" min="<?= $row['ex_date'] ?>" value="<?= $row['im_date'] ?>">
                        </div>
                        <div class="form-group d-flex mb-1">
                            <label for="" style="width: 40%;">Delevery on: </label>
                            <input type="date" class="form-control" name="hn_date" style="width: 60%;" min="<?= $row['ex_date'] ?>" value="<?= $row['hn_date'] ?>">
                        </div>
                        <div class="form-group d-flex mb-1 justify-content-evenly">
                            <button type="submit" name="save" class="btn btn-outline-success"><i class="fa-solid fa-cart-flatbed-suitcase"></i> Save</button>
                            <button type="submit" name="del" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-12 mb-4 p-2 bg-primary bg-gradient bg-opacity-15 text-white ">
                    <?php
                    $details = $db->query("SELECT * FROM `details` WHERE `sm_id` = '$sm_id' AND `p_id` = '$p_id' AND `stt` != 'Đã hủy đơn'");
                    $sdh = 0; //dem so luong don hang da dat;
                    $ssp = 0; //dem sl san pham da ban
                    $sth = 0; // tinh tien hang thu duoc
                    $fee = 0; //tien ship thu cua khach
                    $ship = 0; // tien ship thuc
                    $discount = 0; //tien giam gia don hang
                    foreach ($details as $dem) {
                        $sdh += 1;
                        $ssp += $dem['amount'];
                        $sth += $dem['amount'] * $dem['d_price'];
                        $fee += $dem['fee'];
                        $ship += $dem['ship'];
                        // echo $dem['id'] ."=".$dem['s_id'].",";
                        if ($dem['s_id'] != '0') {
                            $s_id = $dem['s_id'];
                            $sale = $db->query("SELECT `discount` FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
                            $discount += $sale['discount'];
                        }
                    }
                    ?>
                    <div class="form-group d-flex justify-content-bettween">
                        <div class="col-md-4">
                            <div class="row">
                                <p><?= $sdh ?> orders have been sold</p>
                                <p><?= $ssp ?> products have been sold</p>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <p>GMV: <?= number_format($sth) ?> VND</p>
                                <p>Shipping fee: <?= number_format($fee) ?> VND</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">

                                <p>Delevery cost: <?= number_format($ship) ?> VND</p>
                                <p>Total discount: <?= number_format($discount) ?> VND</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>

        </div>
    </div>
</div>

<?php
require_once("../control/end.php");
?>