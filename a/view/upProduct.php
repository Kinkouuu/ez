<?php
require_once '../control/head.php';
require_once '../control/sidebar.php';
?>

<?php
$p_id = get('p_id');
$p = $db->query("SELECT * FROM ((((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `factory` ON `product`.f_id = `factory`.f_id) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id) INNER JOIN `shipment` ON `product`.sm_id = `shipment`.sm_id WHERE `product`.p_id = '$p_id';")->fetch();

?>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <form action="../model/prs_upProduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row mb-3">
                    <div class="col-sm-6 d-flex align-items-center">
                        <label for="" class="col-sm-2">ID:</label>
                        <input class="form-control" name="p_id" type="text" readonly value="<?= $p_id ?>">
                    </div>
                    <div class="col-sm-6 d-flex align-items-center">
                        <label for="" class="col-sm-2">Name:</label>
                        <input class="form-control" type="text" name="name" value="<?= $p['p_name'] ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-6 d-flex align-items-center">
                        <label for="" class="col-sm-2">Factory:</label>
                        <select class="form-select" name="f_id" id="fact">
                            <option value="<?= $p['f_id'] ?>"><?= $p['f_name'] ?></option>
                            <?php
                            $sf_id = $p['f_id'];
                            $fact = $db->query("SELECT * FROM `factory` WHERE `f_id` != '$sf_id' ORDER BY `f_id` DESC");
                            foreach ($fact as $f) {
                            ?>
                                <option value="<?= $f['f_id'] ?>"><?= $f['f_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center">
                        <label for="" class="col-sm-2">Shipment:</label>
                        <select class="form-select" name="smt" id="smt">
                            <option value="<?= $p['sm_id'] ?>"><?= $p['sm_code'] ?></option>
                            <?php
                            $sm_id = $p['sm_id'];
                            $check = $db->query("SELECT sum(amount) as damua FROM `details` WHERE `sm_id` = '$sm_id'")->fetch();
                            $sldm = $check['damua'];
                            echo $sldm;
                            $sm = $db->query("SELECT * FROM `shipment` INNER JOIN `sm_list` ON `shipment`.sm_id = `sm_list`.sm_id WHERE  `shipment`.sm_id  != '$sm_id' AND `sm_list`.p_id ='$p_id' AND `sm_list`.sm_amount > '$sldm' ORDER BY `shipment`.sm_id ASC");
                            foreach ($sm as $row) {
                            ?>
                                <option value="<?= $row['sm_id'] ?>"><?= $row['sm_code'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-6 d-flex align-items-center">

                        <label class="col-sm-2">Type:</label>

                        <select class="form-select" id="tdirec" name="tdirec">
                            <option value="<?= $p['direc'] ?>" class="text-center"><?= $p['direc'] ?></option>
                            <?php
                            $nganh = $p['direc'];
                            $direcs = $db->query("SELECT * FROM `cate` WHERE `direc` != '$nganh' AND `type` is null AND `cate` is null ORDER BY `c_id` ASC");
                            foreach ($direcs as $direc) {
                            ?>
                                <option class="text-center" value="<?= $direc['direc'] ?>"><?= $direc['direc'] ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-select" name="tcate" id="tcate">
                            <option value="<?= $p['cate'] ?>" class="text-center"><?= $p['cate'] ?></option>
                            <?php
                            $dmuc = $p['cate'];
                            $cates = $db->query("SELECT  * FROM `cate` WHERE `direc` = '$nganh' AND `type` is null AND `cate` != '$dmuc'");
                            foreach ($cates as $cate) {
                            ?>
                                <option class="text-center" value="<?= $cate['cate'] ?>"><?= $cate['cate'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <select class="form-select" name="type" id="type">
                            <option value="<?= $p['c_id'] ?>" class="text-center"><?= $p['type'] ?></option>
                            <?php
                            $loai = $p['type'];
                            $types = $db->query("SELECT * FROM `cate` WHERE `direc` = '$nganh' AND `cate` = '$dmuc' AND `type` != '$loai'");
                            foreach ($types as $type) {
                            ?>
                                <option class="text-center" value="<?= $type['c_id'] ?>"><?= $type['type'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center">
                        <div class="col-sm-2">Link review:

                        </div>
                        <input type="url" class="form-control" name="video" value="<?= $p['video'] ?>">

                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-6 d-flex align-items-center">
                        <label class="col-sm-2" for="">Image:</label>
                        <a href="<?= $p['p_img'] ?>"><?= $p['p_img'] ?></a>
                        <input type="text" name="p_img" hidden value="<?= $p['p_img'] ?>">
                        <input type="file" name="image" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                    </div>
                    <div class="col-sm-6 d-flex align-items-center">
                        <label for="" class="col-sm-2">Remain:</label>
                        <input type="number" class="form-control" name="remain" value="<?= $p['remain'] ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-1">
                        Specification:
                    </div>
                    <div class="col-sm-11">
                        <div class="form-floating">
                            <textarea class="form-control" name="specs" id="floatingTextarea" style="height: calc(10em + 2px);" required><?= $p['specs'] ?></textarea>
                            <label for="floatingTextarea" style="color:grey">Start with "-" when entering a new line</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-1 col-form-label">Price:</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="p_gb" placeholder="In GB" value="<?= $p['p_gb'] ?>" required>
                            </div>
                            <div class="col-sm-5">
                                <select class="input-group-text" name="m_id" aria-label="Default select example" style="width: 100%;text-align:center">
                                    <option value="<?= $p['m_id'] ?>"><?= $p['sign'] ?></option>
                                    <?php
                                    $sm_id = $p['m_id'];
                                    $mn = $db->query("SELECT * FROM `money` WHERE `m_id` != '$sm_id' ORDER BY `m_id` ASC");
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
                            <input type="number" class="form-control" name="p_stock" placeholder="In stock" value="<?= $p['p_stock'] ?>" required>
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                        <span class="input-group-text">Coefficient</span>
                            <input type="number" class="form-control" name="factor" step="0.01" min="0.01" placeholder="coefficient" value="<?= $p['factor'] ?>" required>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_50" placeholder="50%" value="<?= $p['p_50'] ?>">
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_10" placeholder="10%" value="<?= $p['p_10'] ?>">
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="offset-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-file-pen"></i> UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../control/end.php';
?>