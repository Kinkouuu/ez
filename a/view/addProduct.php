<?php
require_once '../control/head.php';
require_once '../control/sidebar.php';
?>
<!-- Content Header (Page header) -->
<div class="container-fluid">
    <h2>Add new product</h2>
    <?php
    if (isset($_GET['msg'])) {
        echo '<small class ="form-text" style="color:red;">' . $_GET['msg'] . '</small>';
    }
    ?>
    <div class="col-md-12">
        <div class="row">
            <form action="../model/prs_addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <label class="col-sm-1 col-form-label">Name Product</label>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Enter name product" required>
                        </div>
                    </div>
                    <label class="col-sm-1 col-form-label">Image</label>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-between mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <label class="col-sm-1 col-form-label">Type</label>
                        <div class="col-sm-11 d-flex" style="width: 90%;margin-left:1rem">
                            <select class="form-select" id="tdirec" name="tdirec" style="width: 30%; height:100%; margin-right: 5px" aria-label="Default select example" required>
                                <option value="" class="text-center">--Choose directory--</option>
                                <?php
                                $direcs = $db->query("SELECT * FROM `cate` WHERE `type` is null AND `cate` is null ORDER BY `c_id` ASC");

                                foreach ($direcs as $direc) {
                                ?>
                                    <option class="text-center" value="<?= $direc['direc'] ?>"><?= $direc['direc'] ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-select" name="tcate" id="tcate" style="width: 30%; height:100%; margin-right: 5px" aria-label="Default select example" required>
                                <option value="" class="text-center">--Choose category--</option>

                            </select>
                            <select class="form-select" name="type" id="type" style="width: 30%; height:100%; margin-right: 5px" aria-label="Default select example" required>
                                <option value="" class="text-center">--Choose type--</option>
                            </select>
                        </div>
                    </div>

                    <div class=" col-sm-3 d-flex align-items-center">
                        <label class="col-sm-2 ">Factory</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="f_id" id = "fact" class="custom-select browser-default select2" required>
                                <option value="" class="text-center">--Choose factory--</option>
                                <?php
                                $facts = $db->query("SELECT * FROM `factory` order by `f_id` asc");
                                foreach ($facts as $fact) {
                                ?>
                                    <option value="<?= $fact['f_id'] ?>">
                                        <?= $fact['f_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3 d-flex align-items-center">
                        <label class="col-sm-2">Shipment</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="sm_id" id="smt" class="custom-select browser-default" required>
                            <option value="" class="text-center">--Choose shipment--</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="form-group row mb-1">
                    <label class="col-sm-2 col-form-label">Specification</label>
                    <div class="col-sm-10">
                        <div class="form-floating">
                            <textarea class="form-control" name="spec" id="floatingTextarea" style="height: calc(12rem + 2px);" required></textarea>
                            <label for="floatingTextarea" style="color:grey">Start with "-" when entering a new line</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-1">
                    <label class="col-sm-2 col-form-label">Price Product</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="col-sm-8">
                                <input type="number" step="0.01" class="form-control" name="p_gb" placeholder="In GB" required>
                            </div>
                            <div class="col-sm-4">
                                <select class="input-group-text" name="money" aria-label="Default select example">
                                    <?php
                                    $mn = $db->query("SELECT * FROM `money` ORDER BY `m_id` ASC");
                                    foreach ($mn as $m) {
                                    ?>
                                        <option value="<?= $m['m_id'] ?>"><?= $m['sign'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="number" class="form-control" name="p_stock" placeholder="In stock" required>
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                        <span class="input-group-text">x</span>
                            <input type="number" step="0.01" min="0.01" class="form-control" name="factor" placeholder="Coefficient" required>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_50" placeholder="When deposit 50%">
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_10" placeholder="When deposit 10%">
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>

                </div>

                <div class="form-group row mb-1">
                    <label class="col-sm-2 col-form-label">Remain Product</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="remain" type="number" class="form-control" placeholder="Enter remain product" required>
                        </div>
                    </div>
                </div>


                <div class="form-group row mb-1">
                    <label class="col-sm-2 col-form-label">Review Product</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="video" type="url" class="form-control" placeholder="Enter link review product">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" name="save" class="btn btn-primary"><i class="fas fa-folder-plus"></i> ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- up anh -->

<?php
require_once '../control/end.php';
?>