<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Shipment | <a href="view/addSM.php" style="text-decoration: none; color:cornflowerblue">ADD</a></h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Factory</th>
                        <th scope="col">Shiment Code</th>

                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sms = $db->query("SELECT * FROM `shipment` INNER JOIN `factory` ON `shipment`.f_id = `factory`.f_id ORDER BY `sm_id` DESC");

                    foreach ($sms as $sm) {
                        $sm_id = $sm['sm_id'];
                    ?>
                        <tr>
                            <td><?= $sm['sm_id'] ?></td>
                            <td><?= $sm['f_name'] ?></td>
                            <td><?= $sm['sm_code'] ?></td>
                            <td><td><a href="view/addSMList.php?sm_id=<?= $sm_id ?>"><i class="fa-regular fa-pen-to-square"></i></a></td></td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once("control/end.php");
?>