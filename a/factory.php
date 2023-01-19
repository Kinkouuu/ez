<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Supply Factory | <a href="view/addFact.php" style="text-decoration: none; color:cornflowerblue">ADD</a></h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Represent</th>
                        <th scope="col">Represent's number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Nation</th>
                        <th scope="col">License</th>
                        <th scope="col">Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $facts = $db->query("SELECT * FROM `factory` ORDER BY `f_id` ASC");

                    foreach ($facts as $fact) {
                        $f_id = $fact['f_id'];
                        $count = $db->query("SELECT `p_id` FROM `product` WHERE `f_id` = '$f_id'")->rowCount();
                    ?>
                        <tr>
                            <td><?= $fact['f_id'] ?></td>
                            <td style="width: 10%;"><img src="<?= $fact['f_img'] ?>" alt="" style="width: 100%;"></td>
                            <td><?= $fact['f_name'] ?></td>
                            <td><?= $fact['f_mail'] ?></td>
                            <td><?= $fact['f_phone'] ?></td>
                            <td><?= $fact['represent'] ?></td>
                            <td><?= $fact['rep_phone'] ?></td>
                            <td><?= $fact['f_street'] . " - " . $fact['f_ward'] . " - " . $fact['f_district'] . " - " . $fact['f_city'] ?></td>
                            <td><?= $fact['f_nation'] ?></td>
                            <td>
                                <div>
                                    <?php $lis = $fact['license'];
                                    $tmp = explode('-', $lis);
                                    for ($x = 1; $x < sizeof($tmp); $x++) {
                                        echo "- " .  $tmp[$x] . "<br>";
                                    }
                                    ?>
                                </div>
                            </td>
                            <td><?= $count ?></td>
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