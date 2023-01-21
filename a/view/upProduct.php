<?php
require_once '../control/head.php';
require_once '../control/sidebar.php';
?>
<?php
$p_id = get('p_id');
$p = $db->query("SELECT * FROM (((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `factory` ON `product`.`f_id` = `factory`.`f_id`) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id WHERE `product`.p_id = '$p_id';")->fetch();

?>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <form action="../model/prs_upProduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row mb-3">
                    <div class="col-sm-1 d-flex align-items-center">ID: 
                        <input class="form-control" name ="p_id" type="text" readonly value="<?= $p_id ?>">
                    </div>
                    <div class="col-sm-2 d-flex align-items-center">Name:
                        <input class="form-control" type="text" name="name" value="<?= $p['p_name'] ?>">
                    </div>
                    <div class="col-sm-2 d-flex align-items-center">Type:
                        <select class="form-select" name="type">
                            <option value="<?= $p['c_id'] ?>"><?= $p['type'] ?></option>
                            <?php
                            $sc_id = $p['c_id'];
                            $type = $db->query("SELECT * FROM `cate` WHERE `type` !='' AND `c_id` != '$sc_id' ORDER BY `c_id` DESC");
                            foreach ($type as $t) {
                            ?>
                                <option value="<?= $t['c_id'] ?>"><?= $t['type'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2 d-flex align-items-center">Factory:
                        <select class="form-select" name="f_id">
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
                    <div class="col-sm-5 d-flex align-items-center">Link review:
                        <input type="url" class="form-control" name ="video" style="width:61%" value="<?= $p['video'] ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-5 d-flex align-items-center">
                        Image: <a href="<?= $p['p_img'] ?>"><?= $p['p_img'] ?></a>
                        <input type="text" name="p_img" hidden value="<?= $p['p_img'] ?>">
                        <input type="file" name="image">
                    </div>
                    <div class="col-sm-3 d-flex align-items-center">
                        Remain:
                        <input type="number" class="form-control" name="remain" value="<?= $p['remain'] ?>">
                    </div>
                    <div class="col-sm-3 d-flex align-items-center">
                        Shipment:
                        <input type="number" class="form-control" name="shipment" value="<?= $p['remain'] ?>">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-sm-1">
                        Specification:
                    </div>
                    <div class="col-sm-10">
                        <div class="form-floating">
                            <textarea class="form-control" name="specs" id="floatingTextarea" style="height: calc(10em + 2px);" required><?= $p['specs']?></textarea>
                            <label for="floatingTextarea" style="color:grey">Start with "-" when entering a new line</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                <label class="col-sm-1 col-form-label">Price:</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="p_gb" placeholder="In GB" value="<?= $p['p_gb'] ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <select class="input-group-text" name="m_id" aria-label="Default select example">
                                    <option value="<?= $p['m_id']?>"><?= $p['sign'] ?></option>
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
                            <input type="number" class="form-control" name="p_stock" placeholder="In stock" value="<?= $p['p_stock']?>" required>
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_50" placeholder="When deposit 50%" value="<?= $p['p_50']?>">
                            <span class="input-group-text">VND</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-text">+</span>
                            <input type="number" class="form-control" name="p_10" placeholder="When deposit 10%" value="<?= $p['p_10']?>">
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
<!-- up anh -->

<?php
require_once '../control/end.php';
?>