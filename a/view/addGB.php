<?php
require_once '../control/head.php';
require_once '../control/sidebar.php';
?>
<?php
if (isset($_POST['save'])) {
    $g_name = post('g_name');
    $s_day = post('s_day');
    $s_date = DateTime::createFromFormat('d-m-Y', $s_day)->getTimestamp();
    $e_day = post('e_day');
    $e_date = DateTime::createFromFormat('d-m-Y', $e_day)->getTimestamp();

    // echo $s_day."-" .$e_day ;
    // echo "CONVERT = " ;
    // echo $s_date."-" .$e_date;

    $db->exec("INSERT INTO `gb`  (`g_name`,`s_date`,`e_date`,`g_stt`) VALUES ( '$g_name','$s_date','$e_date','Đang mở group buy');");
    echo '<script>alert("Đã thêm đợt ' . $g_name . '"); window.location = "../sourcing.php";</script>';
}
?>
<!-- Content Header (Page header) -->

<div class="container">
    <h1>Add New Start Sourcing</h1>
</div>


<!-- Main content -->
<div class="container">
    <div class="tab-pane" id="settings">
        <form class="form-horizontal" method="post">
            <div class="form-group d-flex align-items-center">
                <label class="col-sm-2">Name:</label>
                <div class="col-sm-8">
                    <div class="form-group mb-1">
                        <input name="g_name" type="text" class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>

            <div class="form-group d-flex align-items-center">
                <label class="col-sm-2">Open date:</label>
                <div class="col-sm-3">
                    <div class="form-group mb-1">
                        <input type="text" name="s_day" id="date_picker1" class="form-control">
                    </div>
                </div>
                <label class="col-sm-2">Close date: </label>
                <div class="col-sm-3">
                    <div class="form-group mb-1">
                        <input type="text" name="e_day" id="date_picker2" class="form-control">

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

</div>

<?php require_once '../control/end.php'; ?>