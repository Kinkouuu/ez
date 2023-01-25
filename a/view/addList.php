<?php
require_once '../control/head.php';
require_once '../control/sidebar.php';
?>
<?php
$g_id = $_GET['g_id'];
$list = $db->query("SELECT * FROM `gb` WHERE `g_id` = '$g_id'")->fetch();
$today = strtotime(date('Y-m-d H:i:s'));

// echo $g_id;

if (isset($_GET['save'])) {
    $g_id = get('g_id');
    $s_day = get('s_day');
    $s_date = DateTime::createFromFormat('d-m-Y', $s_day)->getTimestamp();
    $e_day = get('e_day');
    $e_date = DateTime::createFromFormat('d-m-Y', $e_day)->getTimestamp();
    $stt = get('stt');
    // echo $g_id . ' from ' . $s_date. ' to ' . $e_date;
    $db->exec("UPDATE `gb` SET `s_date` = '$s_date',`e_date`='$e_date',`g_stt` = '$stt' WHERE `g_id` = '$g_id'"); // cap nhat trang thai gb
    if ($stt != 'Đang mở group buy') {
        $dt = $db->query("SELECT * FROM `details` WHERE `g_id` = '$g_id'");
        foreach ($dt as $r) {
            $id = $r['id'];
            if ($r['stt'] != 'Đã hủy đơn' || $r['stt'] != 'Đã giao hàng') {
                $db->exec("UPDATE `details` SET `stt` = '$stt' WHERE `id` = '$id'");
            }
        }
    }
    echo '<script>alert("Updated batch ' . $list['g_name'] . '"); window.location = "?g_id=' . $g_id . ' ";</script>';
}
if (isset($_GET['add'])) { // them san pham gb
    $a_id = get('add');
    $count = $db->query("SELECT * FROM `gb_list` WHERE `g_id` = '$g_id' AND `p_id` = '$a_id'")->rowCount();
    if ($count == 0) {
        $db->exec("INSERT INTO `gb_list` (`g_id`, `p_id`) VALUES ( '$g_id', '$a_id');");
        echo '<script> window.location = "?g_id=' . $g_id . ' "; </script>';
    } else {
        echo '<script>alert("This product has been added in group by list");window.location = "?g_id=' . $g_id . ' "; </script>';
    }
}
if (isset($_GET['rmv'])) { // xoa san pham khoi gb list
    $r_id =  get('rmv');

    $db->exec("DELETE FROM `gb_list` WHERE `g_id` = '$g_id' AND `p_id` = '$r_id';");
}

?>

<div class="container-fluid m-2">
    <div class="col-md-12">
        <div class="row">


            <form class="d-flex" method="GET">
                <div class="col-md-2 d-flex align-items-center">
                    <label for="" class="col-sm-8 text-center">ID group buy: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="g_id" readonly value="<?= $g_id ?>">
                    </div>
                </div>
                <div class="col-md-3 d-flex  align-items-center">
                    <label for="" class="col-sm-4 text-center">Open at:</label>
                    <div class="col-sm-8">
                        <input type="text" name="s_day" id="date_picker1" class="form-control" value="<?= date("d-m-Y", $list['s_date']) ?>">

                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <label for="" class="col-sm-4 text-center">Close at:</label>
                    <div class="col-sm-8">

                        <input type="text" name="e_day" id="date_picker2" class="form-control" value="<?= date("d-m-Y", $list['e_date']) ?>">
                    </div>
                </div>

                <div class="col-md-3 d-flex  align-items-center">
                    <label class="col-sm-4 text-center">Status:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="stt">
                            <option value="Đang mở group buy" <?php echo $list['g_stt'] == 'Đang mở group buy' ? ' selected ' : ''; ?>>Đang mở group buy</option>
                            <option value="Đóng order" <?php echo $list['g_stt'] == 'Đóng order' ? ' selected ' : ''; ?>>Đóng order</option>
                            <option value="Đặt hàng nhà máy" <?php echo $list['g_stt'] == 'Đặt hàng nhà máy' ? ' selected ' : ''; ?>>Đặt hàng nhà máy</option>
                            <option value="Hàng ra khỏi nhà máy" <?php echo $list['g_stt'] == 'Hàng ra khỏi nhà máy' ? ' selected ' : ''; ?>>Hàng ra khỏi nhà máy</option>
                            <option value="Đã thông quan" <?php echo $list['g_stt'] == 'Đã thông quan' ? ' selected ' : ''; ?>>Đã thông quan</option>
                            <option value="Đến kho TP.HCM" <?php echo $list['g_stt'] == 'Đến kho TP.HCM' ? ' selected ' : ''; ?>>Đến kho TP.HCM</option>
                            <option value="Đến kho Hà Nội" <?php echo $list['g_stt'] == 'Đến kho Hà Nội' ? ' selected ' : ''; ?>>Đến kho Hà Nội</option>
                            <option value="Vận chuyển nội địa" <?php echo $list['g_stt'] == 'Vận chuyển nội địa' ? ' selected ' : ''; ?>>Vận chuyển nội địa</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-1">
                    <button type="submit" name="save" class="btn btn-success">✔</button>
                </div>
            </form>


        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <!-- table view -->
            <div class="col-sm-12 m-1">
                <form method="POST">
                    <select class="select-type" name="type" aria-label="Default select example">
                        <option selected value="">All type product</option>
                        <?php
                        $type = $db->query("SELECT * FROM `cate` WHERE `cate`.type != '' order by `c_id` ASC");
                        foreach ($type as $t) {
                        ?>
                            <option value="<?= $t['c_id'] ?>"><?php echo $t['type'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" name="submit" value="✔">
                    <div class="row">

                        <div class="col-sm-6" style="overflow-y: auto;height:60vh">
                            <table class="table table-striped">
                                <caption style="caption-side:top">ALL PRODUCTS</caption>
                                <tr>
                                    <th>#</th>
                                    <th>Pictures</th>
                                    <th>Name product</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php
                                if (isset($_POST['submit']) && $_POST['type'] != "") {
                                    $type = $_POST['type'];
                                    $c_p = $db->query("SELECT * FROM ((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id WHERE `product`.c_id = '$type' AND  `product`.p_id NOT IN(SELECT `p_id` FROM `gb_list` INNER JOIN `gb` ON `gb_list`.g_id = `gb`.g_id WHERE $today BETWEEN `gb`.s_date AND `gb`.e_date);");
                                } else {
                                    $c_p = $db->query("SELECT * FROM ((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id WHERE `product`.p_id NOT IN(SELECT `p_id` FROM `gb_list` INNER JOIN `gb` ON `gb_list`.g_id = `gb`.g_id WHERE $today BETWEEN `gb`.s_date AND `gb`.e_date);");
                                }

                                foreach ($c_p as $p) {
                                    $p_id = $p['p_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $p_id ?></td>
                                        <td style="width: 15%;">
                                            <img src="<?= $p['p_img']?>" alt="" style="width: 100%;">
                                        </td>
                                        <td><?php echo $p['p_name'] ?></td>
                                        <td><?php echo number_format($p['p_gb']) ?> <?php echo $p['sign'] ?> </td>
                                        <td><?php echo $p['type'] ?></td>
                                        <td><?php echo $p['cate'] ?></td>
                                        <?php
                                        if ($today < $list['e_date']) { ?>
                                            <td>
                                                <a id="add" href="?g_id=<?= $g_id ?>&add=<?= $p['p_id'] ?> ">✚</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="col-sm-6" style="overflow-y: auto;height:60vh">
                            <table class="table table-striped">
                                <caption style="caption-side:top">GROUP BUY LIST</caption>
                                <tr>
                                    <th>#</th>
                                    <th>Pictures</th>
                                    <th>Name product</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php
                                $b2 = $db->query("SELECT * FROM (((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id) INNER JOIN `gb_list` ON `product`.p_id = `gb_list`.p_id  WHERE `gb_list`.g_id = '$g_id'");
                                foreach ($b2 as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['p_id'] ?></td>
                                        <td style="width: 15%;">
                                            <img src="<?= $row['p_img']?>" alt="" style="width: 100%;">
                                        </td>
                                        <td><?php echo $row['p_name'] ?></td>
                                        <td><?php echo number_format($row['p_gb']) ?> <?php echo $row['sign'] ?> </td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['cate'] ?></td>
                                        <?php
                                        if ($today < $list['e_date']) { ?>
                                            <td>
                                                <a href="?g_id=<?= $g_id ?>&rmv=<?= $row['p_id'] ?> ">✘</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php require_once '../control/end.php'; ?>