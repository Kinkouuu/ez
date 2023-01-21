<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>

<?php
if (isset($_POST['save'])) {
}
?>
<!-- Content Header (Page header) -->

<div class="container">
    <h1>Add New Shipment</h1>
</div>


<!-- Main content -->
<div class="container">
    <div class="tab-pane" id="settings">
        <form class="form-horizontal" method="post">
            <div class="form-group row d-flex justify-items-center">
                <div class="col-sm-6 d-flex">
                    <label class="col-sm-2 col-form-label">Factory:</label>
                    <div class="col-sm-10">
                        <select name="f_id" class="form-control" id="">
                            <?php
                            $fact = $db->query("SELECT * FROM `factory` ORDER BY `f_id` ASC");
                            foreach ($fact as $f) {
                            ?>
                                <option value="<?= $f['f_id'] ?>"><?= $f['f_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 d-flex">
                    <label class="col-sm-2 col-form-label">Code:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="code">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">
                    <button type="submit" name="save" class="btn btn-success">
                        <i class="fas fa-cart-plus"></i> ADD
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once '../control/end.php'; ?>