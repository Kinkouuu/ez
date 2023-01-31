<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>


<div class="container mt-3">
    <div class="row">
        <form method="POST" action="../model/prs_addCate.php">
            <div class="col-md-12">
                <input type="radio" id="other" name="subject" value="direc" class="addDirec">
                <label for="">Add directory</label>
                <div class="col-11">
                    <div class="form-group" style="width: 100%; height:100%;">
                        <input type="text" id="direc" class="form-control" name="direc" readonly placeholder="Enter directory name" required>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <input type="radio" id="addcate" name="subject" value="cate" class="addCate">
                <label for="">Add category</label>
                <div class="col-11 d-flex align-items-center">
                    <select class="form-select direc" name="cdirec" style="width: 40%; height:100%; margin-right: 5px" aria-label="Default select example">
                        <option value="" class="text-center">--Chose directory--</option>
                        <?php
                        $direcs = $db->query("SELECT * FROM `cate` WHERE `type` is null AND `cate` is null ORDER BY `c_id` ASC");
                        foreach ($direcs as $direc) {
                        ?>
                            <option class="text-center" value="<?= $direc['direc'] ?>"><?= $direc['direc'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="" style="width: 60%; height:100%;">
                        <input type="text" id="cate" class="form-control" readonly value=""  name="cate" placeholder="Enter category name" required>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <input type="radio" id="addtype" name="subject" value="type" class="addType" checked>
                <label for="">Add type</label>
                <div class="col-md-11 d-flex align-items-center">
                    <select class="form-select" id="tdirec" name="tdirec" style="width: 20%; height:100%; margin-right: 5px" aria-label="Default select example">
                        <option value="" class="text-center">--Chose directory--</option>
                        <?php
                        $direcs = $db->query("SELECT * FROM `cate` WHERE `type` is null AND `cate` is null ORDER BY `c_id` ASC");

                        foreach ($direcs as $direc) {
                        ?>
                            <option class="text-center" value="<?= $direc['direc'] ?>"><?= $direc['direc'] ?></option>
                        <?php } ?>
                    </select>
                    <select class="form-select" name="tcate" id="tcate" style="width: 20%; height:100%; margin-right: 5px" aria-label="Default select example">
                        <option value="" class="text-center">--Chose category--</option>
                        
                    </select>
                    <div class="" style="width: 60%; height:100%;">
                        <input type="text" id="type" class="form-control" name="type" placeholder="Enter type name" required>
                    </div>
                </div>
            </div>
            <div class="mt-1">
                <button type="submit" name="save" class="btn btn-success">ADD</button>
            </div>
        </form>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $("input[name='subject']").click(function() {
        $("#direc").prop("readonly", true); //ko click thi disable
        $('#direc').val("");
        if ($(this).hasClass('addDirec')) {
            $("#direc").prop("readonly", false); // click vao thi able
        }
    });

    $("input[name='subject']").click(function() {
        $("#cate").prop("readonly", true); //ko click thi disable
        $('#cate').val("");
        if ($(this).hasClass('addCate')) {
            $("#cate").prop("readonly", false); // click vao thi able
        }
    });


    $("input[name='subject']").click(function() {
        $("#type").prop("readonly", true); //ko click thi disable
        $('#type').val("");
        if ($(this).hasClass('addType')) {
            $("#type").prop("readonly", false); // click vao thi able
        }
    });
</script>

</div>

<?php
require_once("../control/end.php");
?>