<?php
require_once("control/head.php");
require_once("control/sidebar.php");

if (isset($_SESSION['admin'])){
    $a_id = $_SESSION['admin'];
    echo $a_id;
}else{
    echo '<script>alert("You must log in by admin account"); window.location = "index.php ";</script>';
}
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category & Type | <a href="view/addCate.php" style="text-decoration: none; color:cornflowerblue">ADD</a></h3>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $types = $db->query("SELECT * FROM `cate` ORDER BY `type` ASC");

                foreach ($types as $type) {
                    $c_id= $type['c_id'];
                ?>
                    <tr>
                        <td><?= $type['c_id'] ?></td>
                        <td><?= $type['cate'] ?></td>
                        <td><?= $type['type'] ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
                </div>
    </div>
</div>
</div>
<?php
require_once("control/end.php");
?>