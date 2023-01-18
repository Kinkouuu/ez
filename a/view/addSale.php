<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>

<?php
if (isset($_POST['save'])) {
    $code = post('code');
    $discount = post('discount');
    $lap = $db->query("SELECT * FROM `sale` WHERE `code` = '$code'")->rowCount();
    if ($lap > 0) {
        echo '<script>alert("Đã tồn tại mã ' . $code . '"); window.location = "../sale.php";</script>';
    } else {
        $db->exec("INSERT INTO `sale`  (`code`,`discount`) VALUES ( '$code','$discount');");
        echo '<script>alert("Đã thêm mã ' . $code . '"); window.location = "../sale.php";</script>';
    }
}
?>
<!-- Content Header (Page header) -->

<div class="container">
    <h1>Add Voucher Discount</h1>
</div>


<!-- Main content -->
<div class="container">
    <div class="tab-pane" id="settings">
        <form class="form-horizontal" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Code</label>
                <div class="col-sm-8">
                    <div class="form-group mb-1">
                        <input name="code" type="text" class="form-control" placeholder="Enter voucher code" required>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Discount</label>
                <div class="col-sm-8">
                <div class="input-group mb-3">
                <input type="number" class="form-control" name = "discount" placeholder="Discount" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2">VND</span>
</div>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" name="save" class="btn btn-success">ADD</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once '../control/end.php'; ?>