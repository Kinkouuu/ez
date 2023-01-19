<?php
require_once 'control/head.php';
require_once 'control/sidebar.php';
?>

<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="container">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Start Sourcing | <a href="view/addGB.php" style="text-decoration: none; color:cornflowerblue">ADD</a></h3>

        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 5%">
                            #
                        </th>
                        <th style="width: 15%">
                            Name
                        </th>
                        <th style="width: 15%">
                            Open date
                        </th>
                        <th style="width: 15%">
                            Close date
                        </th>
                        <th style="width: 30%">
                            Status
                        </th>
                        <th style="width: 15%">
                            Number of product
                        </th>
                        <th style="width: 5%">&nbsp;
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $gbs = $db->query("SELECT * FROM `gb` ORDER BY `g_id` DESC");
                    foreach ($gbs as $gb) {
                        $g_id = $gb['g_id'];
                        $s_day = date("d-m-Y", $gb['s_date']);
                        $e_day = date("d-m-Y", $gb['e_date']);
                    ?>
                        <tr>
                            <td>
                                <?= $gb['g_id']; ?>
                            </td>
                            <td>
                                <?= $gb['g_name'] ?>
                            </td>
                            <td>
                                <?= $s_day ?>
                            </td>
                            <td>
                                <?= $e_day ?>
                            </td>
                            <td>
                            <?= $gb['g_stt'] ?>
                            </td>
                            <td>
                                <?php
                                $ssp = $db->query("SELECT COUNT(p_id) AS count FROM `gb_list` WHERE `g_id` = '$g_id';");
                                foreach ($ssp as $l) {
                                    echo $l['count'];
                                }
                                ?>
                            </td>

                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="view/addList.php?g_id=<?= $gb['g_id']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'control/end.php'; ?>