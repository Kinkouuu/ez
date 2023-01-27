<table class="table text-center" id="product">
  <thead>
    <tr>
      <th>#</th>
      <th>Picture</th>
      <th>Name</th>
      <th>Price</th>
      <th>Type</th>
      <th>Category</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("../control/config.php");
    if (isset($_POST['f_id'])) {
      $key = $_POST['f_id'];
      $pro = $db->query("SELECT * FROM ((`product` INNER JOIN `cate` ON `product`.c_id = `cate`.c_id) INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id  WHERE `product`.f_id= '$key'");
      foreach ($pro as $row) {
    ?>
        <tr>
          <td>
            <?= $row['p_id'] ?>
          </td>
          <td style="width: 12%;">
            <img src="<?= $row['p_img'] ?>" alt="" width="100%">
          </td>
          <td>
            <?= $row['p_name'] ?>
          </td>
          <td>
            <table class="table table-striped table-hover d-flex justify-content-center">
              <tbody>
                <tr>
                  <td class="d-flex">
                    GB: <br> <?= $row['p_gb'];  ?> <?= $row['sign']; ?> </br>
                  </td>
                </tr>
                <tr>
                  <td>
                    Stock: <br><?= $row['p_stock']; ?> VND</br>
                  </td>
                </tr>
              </tbody>
              <tbody class="border-0">
                <tr>
                  <td>
                    50%: <br>+<?= $row['p_50']; ?> VND</br>
                  </td>
                </tr>
                <tr>
                  <td>
                    10%: <br>+<?= $row['p_10']; ?> VND</br>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td><?= $row['type'] ?></td>
          <td><?= $row['cate'] ?></td>
          <td>
            <input type="checkbox" class="form-check-input" name="addSP[]" value="<?= $row['p_id'] ?>" id="">
          </td>
        </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>