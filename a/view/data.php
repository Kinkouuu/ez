
<table class="table" id="product">
  <thead>
    <tr>
      <th>#</th>
      <th>Picture</th>
      <th>Name</th>
      <th>Type</th>
      <th>Category</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody >
      <?php
require_once("../control/config.php");
if(isset($_POST['f_id'])){
$key = $_POST['f_id'];
$pro = $db->query("SELECT * FROM `product` WHERE `f_id`= '$key'");
foreach ( $pro as $row){
        ?>
        <tr>
        <td>
                <?= $row['p_id']?>
        </td>
        <td style="width: 10%;">
                <img src="<?= $row['p_img']?>" alt="" width="100%">
        </td>
        <td>
        <?= $row['p_name']?>
        </td>
        </tr>
        <?php
} 
}
?>       
  </tbody>
</table>