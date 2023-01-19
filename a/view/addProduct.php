<?php
require_once '../control/head.php';
require_once '../control/sidebar.php';
?>
<!-- Content Header (Page header) -->
<div class="container">
    <h2>Add new product</h2>
    <?php
    if (isset($_GET['msg'])) {
        echo '<small class ="form-text" style="color:red;">' . $_GET['msg'] . '</small>';
    }
    ?>
    <div class="col-md-12">
        <div class="row">
            <form action="../model/prs_addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name Product</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Enter name product" required>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="d-flex align-items-center" style="width:30%">
                        <label class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10" style="width: 100%;margin-left:1rem">
                            <select name="type" class="custom-select browser-default select2" required>
                                <?php
                                $types = $db->query("SELECT * FROM `cate` WHERE `type` !='' ORDER BY `c_id` ASC");
                                foreach ($types as $type) {
                                ?>
                                    <option selected value="<?= $type['c_id'] ?>">
                                        <?= $type['type'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center" style="width:30%">
                        <label>Factory</label>
                        <div class="" style="width: 100%;margin-left:1rem">
                            <select name="f_id" class="custom-select browser-default select2" required>
                                <?php
                                $factorys = $db->query("SELECT * FROM `factory` order by `f_id` asc");
                                foreach ($factorys as $factory) {
                                ?>
                                    <option value="<?php echo $factory['f_id'] ?>">
                                        <?= $factory['f_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center" style="width:30%">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image">
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
                                <input type="number" class="form-control" name="p_gb" placeholder="In GB" required>
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
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_50" placeholder="When deposit 50%">
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
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