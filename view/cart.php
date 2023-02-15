<div class="container-fluid p-auto bg-info bg-gradient  bg-opacity-25 mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 10vh">
    <h1 class="font-weight-semi-bold text-uppercase m-auto ">Giỏ hàng</h1>
  </div>
</div>

<div class="container-fluid m-1">
  <div class="row">
    <?php
    $carts = $db->query("SELECT * FROM `cart` WHERE `u_id` = '$u_id' ORDER BY `p_id` ASC"); // lay san pham trong gio hang
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
                <input type="number" class="border border-2 rounded" min="1" max="<?= $sp['remain'] ?>" value="<?= $sp['unit'] ?>" style="min-width:50%">
              </div>
              <?php
              if (isset($_GET['reply']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'true' ) {
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
                  if(isset($_SESSION['s_id']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'true'){
                    $s_id = $_SESSION['s_id'];
                    // echo $s_id;
                    $gg = $db->query("SELECT * FROM  `sale` WHERE `s_id` = '$s_id'")->fetch();
                    $tmp = $sp['p_stock'] * $sp['unit'] + 40000 - $gg['discount'];
                  }else{
                    $tmp = $sp['p_stock'] * $sp['unit'] +40000;
                  }
                  if($tmp <=0){
                    $provi = 0;
                  }else{
                    $provi = $tmp;
                  }
                  ?>
                <p><?= number_format($provi) ." VND"?></p>
                <!-- <p>43,000 VND</p> -->
              </div>
            </div>
            <div class="col-md-2 d-flex flex-column ">
              <div class="row justify-content-end me-2">
                <button class="btn btn-outline-danger" style="width:50px"><i class="fa-solid fa-trash"></i></button>
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
                <!-- <p><?= number_format($sp['p_gb'], 2, '.', '') . " " . $sp['sign'] ?></p> -->
                <p><?= number_format($sp['p_gb'] * $sp['factor'] * $sp['ex']) . " " . "VND" ?></p>
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column ">
              <div class="d-flex justify-content-between mb-0">
                <label for=""><strong> Số lượng đặt trước: </strong></label>
                <input type="number" class="border border-2 rounded" min="1" max="<?= $sp['remain'] ?>" value="<?= $sp['book'] ?>" style="min-width:50%">
              </div>
              <?php
              if (isset($_GET['reply']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'false' ) {
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
                  if(isset($_SESSION['s_id']) && $_SESSION['pid'] == $p_id && $_GET['stock'] == 'false'){
                    $s_id = $_SESSION['s_id'];
                    // echo $s_id;
                    $gg = $db->query("SELECT * FROM  `sale` WHERE `s_id` = '$s_id'")->fetch();
                    $tmp = $sp['p_gb'] * $sp['factor'] *$sp['ex'] * $sp['book'] + 40000 - $gg['discount'];
                  }else{
                    $tmp =$sp['p_gb'] * $sp['factor'] *$sp['ex']*$sp['book'] +40000;
                  }
                  if($tmp <=0){
                    $provi = 0;
                  }else{
                    $provi = $tmp;
                  }
                  ?>
                <p><?= number_format($provi) ." VND"?></p>
              </div>
            </div>
            <div class="col-md-2 d-flex flex-column ">
              <div class="row justify-content-end me-2">
                <button class="btn btn-outline-danger" style="width:50px"><i class="fa-solid fa-trash"></i></button>
                <a href="?action=thongtinsanpham&p_id=<?= $sp['p_id'] ?>" style="text-align: end;text-decoration:underline"><small>Chi tiết sản phẩm >></small></a>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
</div>