<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>
<?php
if(isset($_GET['u_id'])){
    $u_id = $_GET['u_id'];
}
$in4 = $db->query("SELECT * FROM `user` WHERE `u_id` = '$u_id'")->fetch();
if(isset($_POST['save'])){
    $cmt = post('cmt');
    $db->exec("UPDATE `user` SET `cmt` = '$cmt' WHERE `u_id` ='$u_id'");
    echo '<script>alert("Đã cập nhật User ID ' . $u_id . '"); window.location = "../user.php";</script>';
}
?>
<h3>Comment User</h3>
    

<div class="container">
    <form action="" method="POST">
    <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-8">
                    <div class="form-group mb-1">
                        <input readonly class="form-control" value="<?=$u_id?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name User</label>
                <div class="col-sm-8">
                    <div class="form-group mb-1">
                        <input readonly class="form-control" value="<?= $in4['f_name'] ." " .$in4['l_name']?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone number</label>
                <div class="col-sm-8">
                    <div class="form-group mb-1">
                        <input readonly class="form-control" value="<?= $in4['phone'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Comment</label>
                <div class="col-sm-8">
                    <div class="form-group mb-1">
                        <textarea name = "cmt" class="form-control" rows="5"><?= $in4['cmt']?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" name="save" class="btn btn-success"><i class="fas fa-check-to-slot"></i></button>
                </div>
            </div>
    </form>
</div>
<?php require_once '../control/end.php'; ?>