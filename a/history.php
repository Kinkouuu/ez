<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <h3>Manage administrator activities</h3>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
<tr>
<th class="table-primary" >
                        Admin
                    </th>
                    <th class="table-info">
                        Action
                    </th>
                    <th class="table-success">
                        At
                    </th>
</tr>
                </thead>
                <tbody>
<?php
$his = $db->query("SELECT * FROM `history` INNER JOIN `admin` ON `history`.a_id = `admin`.a_id ORDER BY `h_id` DESC");
foreach($his as $row){
?>
<tr>
    <td class="table-primary"><?= $row['name']?></td>
    <td class="table-info"><?= $row['action']?></td>
    <td class="table-success"><?= $row['time']?></td>
</tr>
<?php
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once("control/end.php");
?>