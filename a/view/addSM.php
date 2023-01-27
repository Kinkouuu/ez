<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>


<!-- Content Header (Page header) -->

<div class="container">
    <h1>Add New Shipment</h1>
</div>


<!-- Main content -->
<div class="container">
    <div class="tab-pane" id="settings">
        <form action="../model/prs_addSM.php" class="form-horizontal" method="POST">
            <div class="form-group row d-flex justify-items-center">
                <div class="col-sm-5 d-flex">
                    <label class="col-sm-3 col-form-label">Factory:</label>
                    
                    <div class="col-sm-9">
                        <select class="form-control" name="f_id" id="fact">
                        <option selected value="">--Select supply factory--</option>
                            <?php
                            $facts = $db->query("SELECT * FROM `factory` ORDER BY `f_id` ASC");
                                foreach ( $facts as $f){
                                    ?>
                                    <option value="<?= $f['f_id']?>"><?= $f['f_name']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5 d-flex">
                    <label class="col-sm-3 col-form-label">Code Shipment:</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="code" required>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary" name="add"><i class="fa-sharp fa-solid fa-cart-flatbed"></i> ADD</button>
                </div>
                <div class="col-sm-12 mt-1" style="height: 70vh;overflow-y:auto">
                                <?php
                                require_once("cty_sp.php");
                                ?>
                </div>
        </form>
    </div>
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once '../control/end.php'; ?>