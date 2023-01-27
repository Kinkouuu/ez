<?php 
require_once 'control/head.php'; 
require_once 'control/sidebar.php'; 
?>

<!-- Content Header (Page header) -->
<script src="table2excel.js"></script>
<?php 
$users = $db->query("SELECT * FROM `user` ORDER BY `u_id` ASC");
$user = $db->query("SELECT DISTINCT(u_id) FROM `order`");
$n_u = 0; // số người dùng
$n_o = 0; // số đơn hàng
$n_p = 0; // số sản phẩm đã mua
$n_pf = 0; // số tiền phụ phí
$n_df = 0; // số tiền ship
$n_d= 0; // số tiền giảm
$n_m = 0; // số tiền hàng
$total = 0 ; //số tiền đã chi ra
?>

<!-- Main content -->
<section class="content">
<strong>Registered users: <?php echo $users->rowCount() ?></strong><br>

<strong>Number of users have ordered: <?php echo $user->rowCount() ?></strong> 
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User's spending</h3> <br>
        </div>

        <div class="card-body p-0">
            <div class="d-flex justify-content-between">
            <form class="select d-flex" method="GET">
                <p>User have ordered: <input type="number" min = "0" name="times"> times </p>
                <input type="submit" name="submit" value="✔">
            </form>
            <button id="export">Export to CSV</button>
            </div>
            <?php if (isset($_GET['submit'])){
                $times = $_GET['times'];
            }else{
                $times ='';
            }
             ?>
            <table class="table table-striped projects" id = "dataList">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 10%">
                            User name
                        </th>
                        <th style="width: 10%">
                            Phone number
                        </th>
                        <th>
                            Order number
                        </th>
                        <th>
                            Quantity of products purchased
                        </th>
                        <th>
                            Processing fee
                        </th>
                        <th>
                            Delivery fee
                        </th>
                        <th>
                            Discount
                        </th>
                        <th>
                            Total price of product
                        </th>
                        <th>
                            Total purchase amount
                        </th>

                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>
<script>
    document.getElementById('export').addEventListener('click', function(){
        var table2excel = new Table2Excel();
  table2excel.export(document.querySelectorAll("#dataList"));
    });
</script>
<!-- /.content-wrapper -->
<?php require_once 'control/end.php'; ; ?>