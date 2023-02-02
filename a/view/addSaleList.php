<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>

<?php
$s_id = get('s_id');
$ds = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
//them nguoi dung vao danh sach
if (isset($_GET['addUser'])) {
    $add_id = get('addUser');
    // echo $s_id. "$" . $a_id;
    $count = $db->query("SELECT * FROM `sale_user` WHERE `s_id` = '$s_id' AND `u_id` = '$add_id'")->rowCount();
    if ($count == 0) {
        $db->exec("INSERT INTO `sale_user` (`s_id`, `u_id`,`max`) VALUES ( '$s_id', '$add_id','1')");
        $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã thêm người dùng `ID = $add_id` vào danh sách dùng mã giảm giá `ID = $s_id`')");
        echo '<script> window.location = "../view/addSaleList.php?s_id=' . $s_id . ' "; </script>';
    } else {
        echo '<script>alert("This user has been added in sale list");window.location = "?s_id=' . $s_id . ' "; </script>';
    }
}
// xoa nguoi dung khoi danh sach
if (isset($_GET['rmvUser'])) {
    $r_id =  get('rmvUser');
    $db->exec("DELETE FROM `sale_user` WHERE `s_id` = '$s_id' AND `u_id` = '$r_id';");
    $db->exec("INSERT INTO `history` (`a_id`, `action`) VALUES ('$a_id', 'Đã thêm xóa dùng `ID = $r_id` khỏi danh sách dùng mã giảm giá `ID = $s_id`')");
    echo '<script>window.location = "?s_id=' . $s_id . ' "; </script>';
}

?>
<div class="container-fluid">
    <form action="../model/prs_saleList.php" method="POST">
        <input type="hidden" name = "s_id" value="<?= $s_id ?>">
        <!-- thong tin giam gia -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                    <div class="col-md-2">
                        <label for="">Voucher ID: </label>
                        <?php echo $s_id ?>
                    </div>
                    <div class="col-md-2">
                    <label for="">Code: </label>
                        <?php echo $ds['code'] ?>
                    </div>
                    <div class="col-md-2">
                    <label for="">Discount: </label>
                        <?php echo number_format($ds['discount']) . " VND" ?>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="allUser"  class="btn btn-outline-primary" data-toggle="tooltip" data-placement="right" title="Thêm tất cả người dùng vào danh sách" style="width: 50%;">
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="delUser"  class="btn btn-outline-danger" data-toggle="tooltip" data-placement="right" title="Xóa tất cả người dùng khỏi danh sách" style="width: 50%;">
                            <i class="fa-solid fa-user-minus"></i>
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="allSP"  class="btn btn-outline-primary" data-toggle="tooltip" data-placement="right" title="Thêm tất cả sản phẩm vào danh sách" style="width: 50%;">
                            <i class="fas fa-file-circle-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="delSP"  class="btn btn-outline-danger" data-toggle="tooltip" data-placement="right" title="Xóa tất cả sản phẩm khỏi danh sách" style="width: 50%;">
                            <i class="fas fa-file-circle-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- danh sach nguoi dung -->
        <div class="col-md-12 border-bottom border-secondary">
            <div class="row">
                <!-- danh sach nguoi ko duoc dung -->
                <div class="col-sm-5" style="overflow-y: auto;height:80vh">
                    <table class="table table-striped">
                        <caption style="caption-side:top">ALL USERS</caption>
                        <tr>
                            <th>ID User</th>
                            <th>Phone Number </th>
                            <th>Name User</th>
                            <th>&nbsp</th>
                        </tr>
                        <?php
                        $user = $db->query("SELECT * FROM `user` WHERE `u_id` NOT IN (SELECT `u_id` FROM `sale_user` WHERE `s_id` = '$s_id')");
                        foreach ($user as $row) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['u_id'] ?>
                                </td>
                                <td>
                                    <?php echo $row['phone'] ?>
                                </td>
                                <td>
                                    <?php echo $row['f_name'] . " " . $row['l_name'] ?>
                                </td>
                                <td>
                                    <a id="addUser" href="?s_id=<?= $s_id ?>&addUser=<?= $row['u_id'] ?> ">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </td>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <!-- danh sach nguoi duoc dung -->
                <div class="col-sm-7" style="overflow-y: auto;height:80vh">
                    <table class="table table-striped">
                        <caption style="caption-side:top">USERS CAN USE</caption>
                        <tr>
                            <th style="width: 10%;">ID User</th>
                            <th style="width: 25%;">Phone Number </th>
                            <th style="width:25%;">Name User</th>
                            <th style="width: 20%;">Number of use
                                <small class="rounded-circle btn btn-default pb-1 p-0 m-0" data-toggle="tooltip" data-placement="right" title="Giới hạn số lần sử dụng mã giảm giá." style="width: 10%;">
                                <i class="fa-regular fa-circle-question"></i>
                                </small>
                            </th>
                            <th colspan="2" style="width: 20%;">
                                <form action="" method="GET">
                                    <div class="d-flex">
                                        <input type="number" min = '0' name="allMax" class="form control me-1" style="width: 100%;">
                                        <button name = "saveMax" class="btn btn-primary"><i class="fas fa-floppy-disk"></i></button>
                                    </div>
                                </form>
                            </th>
                        </tr>
                        <?php
                        $use = $db->query("SELECT * FROM (`user` INNER JOIN `sale_user` ON `user`.u_id = `sale_user`.u_id) INNER JOIN `sale` ON `sale_user`.s_id = `sale`.s_id WHERE `sale_user`.s_id='$s_id'");
                        foreach ($use as $list) {
                        ?>
                            <form action="" method="POST">
                                <tr>
                                    <td>
                                        <input type="hidden" name="u_id" value="<?= $list['u_id'] ?>">
                                        <?php echo $list['u_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $list['phone'] ?>
                                    </td>
                                    <td>
                                        <?php echo $list['f_name'] . " " . $list['l_name'] ?>
                                    </td>
                                    <td>
                                        <input type="number" min="0" id="max" name="max" value="<?= $list['max'] ?>">
                                    </td>
                                    <td>
                                        <button type="submit" name="save" class="btn">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a class="btn" id="rmvUser" href="?s_id=<?= $s_id ?>&rmvUser=<?= $list['u_id'] ?> ">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
                <!-- danh sach san pham -->
                <div class="col-md-12 border-bottom border-secondary">
            <div class="row">
                <!-- danh sach san pham ko duoc dung -->
                <div class="col-sm-5" style="overflow-y: auto;height:80vh">
                    <table class="table table-striped">
                        <caption style="caption-side:top">ALL PRODUCTS</caption>
                        <tr>
                            <th>ID</th>
                            <th>Pictures</th>
                            <th>Name Product</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>
                                <button type="submit" class="btn btn-outline-primary" name ="addSP" ata-toggle="tooltip" data-placement="right" title="Thêm sản phẩm đã chọn">
                                    <i class="fa-regular fa-square-plus"></i>
                                </button>
                            </th>
                        </tr>
                        <?php
                        $products = $db->query("SELECT * FROM `product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id WHERE `p_id` NOT IN (SELECT `p_id` FROM `sale_product` WHERE `s_id` = '$s_id')");
                        foreach ($products as $p) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $p['p_id'] ?>
                                </td>
                                <td style="width: 20%;">
                                    <img src="<?= $p['p_img']?>" alt="" style="width: 100%;">
                                </td>
                                <td>
                                    <?php echo $p['p_name'] ?>
                                </td>
                                <td>
                                    <?php echo $p['cate'] ?>
                                </td>
                                <td>
                                    <?php echo $p['type'] ?>
                                </td>
                                <td>
                                    <input class="form-check-input" type="checkbox" value="<?= $p['p_id'] ?>" name="themSP[]">
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <!-- danh sach san pham -->
                <div class="col-sm-7" style="overflow-y: auto;height:80vh">
                    <table class="table table-striped">
                        <caption style="caption-side:top">USE FOR PRODUCTS</caption>
                        <tr>
                            <th>ID</th>
                            <th>Pictures</th>
                            <th>Name Product</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>
                                <button type="submit" class="btn btn-outline-danger" name ="rmvSP" ata-toggle="tooltip" data-placement="right" title="Xóa sản phẩm đã chọn khỏi danh sách áp dụng">
                                    <i class="fa-regular fa-square-minus"></i>
                                </button>
                            </th>
                        </tr>
                        <?php
                        $usefor = $db->query("SELECT * FROM ((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id ) INNER JOIN `sale_product` ON `product`.p_id = `sale_product`.p_id) INNER JOIN `sale` ON `sale_product`.s_id = `sale`.s_id WHERE `sale_product`.s_id='$s_id'");
                        foreach ($usefor as $for) {
                        ?>
                            
                            <tr>
                                <td>
                                    <?php echo $for['p_id'] ?>
                                </td>
                                <td style="width: 15%;">
                                    <img src="<?= $for['p_img']?>" alt="" style="width: 100%;">
                                </td>
                                <td>
                                    <?php echo $for['p_name'] ?>
                                </td>
                                <td>
                                    <?php echo $for['cate'] ?>
                                </td>
                                <td>
                                    <?php echo $for['type'] ?>
                                </td>
                                <td>
                                    <input class="form-check-input" type="checkbox" value="<?= $for['p_id'] ?>" name="xoaSP[]">
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
        
    </form>
</div>

</div>


<?php require_once '../control/end.php'; ?>