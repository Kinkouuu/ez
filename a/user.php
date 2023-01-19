<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Adrees</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $db->query("SELECT * FROM `user` ORDER BY `u_id` ASC");

                    foreach ($users as $user) {
                        $u_id = $user['u_id'];
                    ?>
                        <tr>
                            <td><?= $u_id ?></td>
                            <td><?= $user['f_name'] . " " . $user['l_name']?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['no'] ." - " . $user['street'] ." - " . $user['ward']." - " . $user['district']?></td>
                            <td><?= $user['city']?></td>
                            <td><?= $user['email']?></td>
                            <td><?= $user['cmt']?></td>
                            <td><a href="view/cmtUser.php?u_id=<?= $u_id ?>"><i class="fa-sharp fa-solid fa-file-pen"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once("control/end.php");
?>