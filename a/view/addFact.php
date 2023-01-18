<?php
require_once("../control/head.php");
require_once("../control/sidebar.php");
?>

<!-- Content Header (Page header) -->

<div class="container">
    <h1>Add Supply Factory Information</h1>
</div>


<!-- Main content -->
<div class="container">

        <form class="form-horizontal" action="../model/prs_addFact.php" method="post"  enctype="multipart/form-data">
            <div class="form-group row mb-1">
                <label class="col-sm-2 col-form-label">Factory name</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Enter name factory" required>
                    </div>
                </div>
                <label class="col-sm-2 col-form-label">Factory logo</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                        <?php 
                                                        if (isset($_GET['msg'])) {
                                                            echo '<small class ="form-text" style="color:red;">' . $_GET['msg'] . '</small>';
                                                        }
                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="form-group row  mb-1">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input name="mail" type="email" class="form-control" placeholder="Enter factory's email" required>
                    </div>
                </div>
                <label class="col-sm-2 col-form-label">Phone number</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input name="phone" type="text" class="form-control" placeholder="Enter factory's phone number" required>
                    </div>
                </div>
            </div>
            <div class="form-group row  mb-1">
                <label class="col-sm-2 col-form-label">Represent</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input name="represent" type="text" class="form-control" placeholder="Enter factory's represent" required>
                    </div>
                </div>
                <label class="col-sm-2 col-form-label">Represent's phone</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input name="rep_phone" type="text" class="form-control" placeholder="Enter represent's phone number" required>
                    </div>
                </div>
            </div>
            <div class="form-group row  mb-1">

            </div>
            <div class="form-group row  mb-1">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10 d-flex">
                    <div class="col-sm-3 me-1">
                        <input name="street" type="text" class="form-control" placeholder="Street" required>
                    </div>
                    <div class="col-sm-2 me-1">
                        <input name="ward" type="text" class="form-control" placeholder="Ward" required>
                    </div>
                    <div class="col-sm-2 me-1">
                        <input name="district" type="text" class="form-control" placeholder="District" required>
                    </div>
                    <div class="col-sm-2 me-1">
                        <input name="city" type="text" class="form-control" placeholder="City" required>
                    </div>
                    <div class="col-sm-3">
                        <input name="nation" type="text" class="form-control" placeholder="Nation" required>
                    </div>
                </div>
            </div>

            <div class="form-group row  mb-1">
                <label class="col-sm-2 col-form-label">License </label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea name="license" id="" rows="5" style="width: 100%;"></textarea>
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
<?php require_once '../control/end.php'; ?>