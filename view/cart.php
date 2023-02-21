<?php
if (!isset($_SESSION['user'])) {
  echo '<script>window.location="signin.php"</script>';
}
if (isset($_SESSION['payment'])) {
  $payment = $_SESSION['payment'];
} else {
  $payment = '100%';
}
// echo $payment;
$loi = false;
$today = strtotime(date('Y-m-d H:i:s')); //lay gian hien tai
if (isset($_GET['sdel'])) { //xoa sp dat san
  $iddel = mget('sdel');
  $ktra0 = $db->query("SELECT * FROM `cart` WHERE `u_id` = '$u_id' AND `p_id` = '$iddel'")->fetch();
  if ($ktra0['book'] == 0) {
    $db->exec("DELETE FROM `cart` WHERE u_id = '$u_id' AND p_id = '$iddel' ");
  } else {
    $db->exec("UPDATE `cart` SET `unit` = '0' WHERE `p_id` = '$iddel'");
  }
  echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_GET['gdel'])) { //xoa sp gb
  $idel = mget('gdel');
  $ktra1 = $db->query("SELECT * FROM `cart` WHERE `u_id` = '$u_id' AND `p_id` = '$idel'")->fetch();
  if ($ktra1['unit'] == 0) {
    $db->exec("DELETE FROM `cart` WHERE u_id = '$u_id' AND p_id = '$idel' ");
  } else {
    $db->exec("UPDATE `cart` SET `book` = '0' WHERE `p_id` = '$idel'");
  }
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
<div class="container-fluid p-auto bg-info bg-gradient  bg-opacity-25 mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 10vh">
    <h1 class="font-weight-semi-bold text-uppercase m-auto ">Giỏ hàng</h1>
  </div>
</div>
<?php
if (isset($_GET['tb'])) {
  echo '<h3 class="text-center" style="color:red">' . $_GET['tb'] . '</h3>';
}
?>

<div class="container-fluid m-1">
  <div class="row">
    <?php
    $today = strtotime(date('Y-m-d H:i:s')); //lay gian hien tai
    $tam = 0; // khoi tao tong tien hang
    $carts = $db->query("SELECT * FROM `cart` WHERE `u_id` = '$u_id' ORDER BY `p_id` DESC"); // lay san pham trong gio hang
    if ($carts->rowCount() > 0) {
      foreach ($carts as $cart) {
        $p_id = $cart['p_id']; //lay thong tin tung san pham
        $sp = $db->query("SELECT * FROM ((`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id) INNER JOIN `cart` ON `product`.p_id = `cart`.p_id WHERE `product`.p_id = '$p_id' AND `cart`.u_id ='$u_id'")->fetch();
        // echo $p_id;
        if ($sp['unit'] > 0) { //hang stock
    ?>
          <div class="col-md-12 mb-2 p-3 border">
            <div class="row">
              <div class="col-md-1">
                <img src="<?= $sp['p_img'] ?>" alt="" style="width: 100%;">
              </div>
              <div class="col-md-3 d-flex flex-column ">
                <div class="d-flex justify-content-between mb-auto">
                  <label for=""><strong>Tên sản phẩm: </strong></label>
                  <p><?= $sp['p_name'] ?></p>
                </div>
                <div class="d-flex justify-content-between mt-auto">
                  <label for=""><strong>Đơn giá: </strong></label>
                  <p><?= number_format($sp['p_stock']) . " " . "VND" ?></p>
                </div>
              </div>
              <div class="col-md-4 d-flex flex-column ">
                <div class="d-flex justify-content-between mb-0">
                  <label for=""><strong> Số lượng đặt mua: </strong></label>
                  <!-- <input type="number" id="unit" class="border border-2 rounded" min="1" max="<?= $sp['remain'] ?>" value="<?= $sp['unit'] ?>" style="min-width:50%"> -->
                  <p><?= $sp['unit'] ?></p>
                </div>
                <?php
                if ($sp['remain'] < $sp['unit']) {
                  echo '<small class="text-end" style="color:red">Số lượng đặt mua vượt quá số lượng còn trong kho.</small>';
                  $loi = true;
                }
                if (isset($_GET['reply']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'true') {
                  echo '<small class="text-end" style="color:dodgerblue">' . $_GET['reply'] . '</small>';
                }
                ?>
                <div class="d-flex justify-content-between mt-auto mb-2">
                  <label for=""><strong>Mã giảm giá: </strong></label>
                  <form action="process/xl_discount.php" method="post">
                    <form action="process/xl_discount.php" method="post">
                      <input type="hidden" name="p_id" value="<?= $p_id ?>">
                      <div class="d-flex">
                        <input type="text" class="border border-2 border-end-0 rounded-start" name="stCode" placeholder="Nhập mã giảm giá">
                        <button class="btn-primary rounded-end" type="submit" name="ggst">
                          <i class="fa-solid fa-check-to-slot"></i>
                        </button>
                      </div>
                    </form>
                </div>
              </div>
              <div class="col-md-2 d-flex flex-column">
                <div class="d-flex justify-content-between mb-auto">
                  <label for=""><strong>Phí vận chuyển: </strong></label>
                  <p>40,000 VND</p>
                </div>
                <div class="d-flex justify-content-between mt-auto">
                  <label for=""><strong>Tạm tính: </strong></label>
                  <?php
                  // echo $incre;
                  if (isset($_SESSION['s_id']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'true') {
                    $s_id = $_SESSION['s_id'];
                    // echo $s_id;
                    $gg = $db->query("SELECT * FROM  `sale` WHERE `s_id` = '$s_id'")->fetch();
                    $tmp = $sp['p_stock'] * $sp['unit'] + 40000 - $gg['discount'];
                  } else {
                    $tmp = $sp['p_stock'] * $sp['unit'] + 40000;
                  }
                  if ($tmp <= 0) {
                    $provi = 0;
                  } else {
                    $tam += $tmp;
                    $provi = $tmp;
                  }
                  ?>
                  <p><?= number_format($provi) . " VND" ?></p>
                  <!-- <p>43,000 VND</p> -->
                </div>
              </div>
              <div class="col-md-2 d-flex flex-column ">
                <div class="row justify-content-end me-2">
                  <form action="process/xl_delcart.php" class="text-end" method="POST">
                    <button type="submit" name="dellStock" class="btn btn-outline-danger " style="width:50px">
                      <input type="hidden" name="del_id" value="<?= $p_id ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                  <a href="?action=thongtinsanpham&p_id=<?= $sp['p_id'] ?>" style="text-align: end;text-decoration:underline"><small>Chi tiết sản phẩm >></small></a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        if ($sp['book'] > 0) {
        ?>
          <div class="col-md-12 mb-2 p-3 border">
            <div class="row">
              <div class="col-md-1">
                <img src="<?= $sp['p_img'] ?>" alt="" style="width: 100%;">
              </div>
              <div class="col-md-3 d-flex flex-column ">
                <div class="d-flex justify-content-between mb-auto">
                  <label for=""><strong>Tên sản phẩm: </strong></label>
                  <p><?= $sp['p_name'] ?></p>
                </div>
                <div class="d-flex justify-content-between mt-auto">
                  <label for=""><strong>Đơn giá: </strong></label>
                  <p><?php
                      //tang gia san pham theo payment method
                      if ($payment == '50%') {
                        $incre = $sp['p_50'];
                      } else if ($payment == '10%') {
                        $incre = $sp['p_10'];
                      } else {
                        $incre = 0;
                      }
                      // echo $incre;
                      $dongia = $sp['p_gb'] * $sp['factor'] * $sp['ex'] + $incre;
                      echo number_format($dongia) . " " . "VND" ?></p>
                </div>
              </div>
              <div class="col-md-4 d-flex flex-column ">
                <div class="d-flex justify-content-between mb-0">
                  <label for=""><strong> Số lượng đặt trước: </strong></label>
                  <!-- <input type="number" class="border border-2 rounded" min="1" max="<?= $sp['remain'] ?>" value="<?= $sp['book'] ?>" style="min-width:50%"> -->
                  <p><?= $sp['book'] ?></p>
                </div>
                <?php
                $ktra = $db->query("SELECT max(e_date) as dead FROM(`product` INNER JOIN `gb_list` ON `product`.p_id = `gb_list`.p_id) INNER JOIN `gb` ON `gb_list`.g_id = `gb`.g_id WHERE `product`.p_id = '$p_id'")->fetch();
                if ($today > $ktra['dead']) { //ktra tgian mo gb
                  echo '<small class="text-end" style="color:red"> Đã kết thúc đợt mở group buy</small>';
                  $loi = true;
                }
                if (isset($_GET['reply']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'false') {
                  echo '<small class="text-end" style="color:dodgerblue">' . $_GET['reply'] . '</small>';
                }
                ?>
                <div class="d-flex justify-content-between mt-auto mb-2">
                  <label for=""><strong>Mã giảm giá: </strong></label>
                  <form action="process/xl_discount.php" method="post">
                    <input type="hidden" name="p_id" value="<?= $p_id ?>">
                    <div class="d-flex">
                      <input type="text" class="border border-2 border-end-0 rounded-start" name="gbCode" placeholder="Nhập mã giảm giá">
                      <button class="btn-primary rounded-end" name="gggb">
                        <i class="fa-solid fa-check-to-slot"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-2 d-flex flex-column">
                <div class="d-flex justify-content-between mb-auto">
                  <label for=""><strong>Phí vận chuyển: </strong></label>
                  <p>40,000 VND</p>
                </div>
                <div class="d-flex justify-content-between mt-auto">
                  <label for=""><strong>Tạm tính: </strong></label>
                  <?php

                  if (isset($_SESSION['s_id']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'false') {
                    $s_id = $_SESSION['s_id'];
                    // echo $s_id;
                    $gg = $db->query("SELECT * FROM  `sale` WHERE `s_id` = '$s_id'")->fetch();
                    $tmp = $dongia * $sp['book'] + 40000 - $gg['discount'];
                  } else {
                    $tmp = $dongia * $sp['book'] + 40000;
                  }
                  if ($tmp <= 0) {
                    $provi = 0;
                  } else {
                    $provi = $tmp;
                    $tam += $provi;
                  }
                  ?>
                  <p><?= number_format($provi) . " VND" ?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex flex-column ">
                <div class="row justify-content-end me-2">
                  <form action="process/xl_delcart.php" class="text-end" method="POST">
                    <button type="submit" name="dellGb" class="btn btn-outline-danger " style="width:50px">
                      <input type="hidden" name="del_id" value="<?= $p_id ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                  <a href="?action=thongtinsanpham&p_id=<?= $sp['p_id'] ?>" style="text-align: end;text-decoration:underline"><small>Chi tiết sản phẩm >></small></a>
                </div>
              </div>
            </div>
          </div>
    <?php
        }
      }
    } else {
      echo '
            <div class="col-md-8  m-auto text-center">
              <img src="img/empty.png" alt="" style="width: 70%;">
            </div>
          ';
    }
    ?>
  </div>
</div>