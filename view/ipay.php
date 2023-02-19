<?php
require_once("cart.php");
if (isset($_POST['pmt'])) {
  $_SESSION['payment']  = $_POST['options'];
  echo "<meta http-equiv='refresh' content='0'>";
} else {
  $_SESSION['payment'] = '100%';
}

?>
<h2 class="text-center">---Đặt hàng---</h2>
<?php
$in4 = $db->query("SELECT * FROM `user` WHERE `u_id` = '$u_id'")->fetch();
?>
<div class="container-fluid pt-5 border border-top">
  <div class="row px-xl-5">
    <!-- Choose Payment Method-->
    <div class="col-lg-4">
      <div class="card border-secondary mb-5">
        <div class="card-header bg-success bg-opacity-50 border-0">
          <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-money-check-dollar"></i> Chọn phương thức thanh toán
        </button>
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chọn phương thức thanh toán</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <div class="form-check">
                    <input type='radio' name='options' value='100%' <?php echo $payment == '100%' ? ' checked ' : ''; ?>>
                    <label class="form-check-label">
                      Thanh toán toàn bộ 100% đơn hàng
                    </label>
                  </div>
                  <div class="form-check">
                    <input type='radio' name='options' value='50%' <?php echo $payment == '50%' ? ' checked ' : ''; ?>>
                    <label class="form-check-label">
                      Cọc 50% tổng giá trị đơn hàng
                    </label>
                  </div>
                  <div class="form-check">
                    <input type='radio' name='options' value='10%' <?php echo $payment == '10%' ? ' checked ' : ''; ?>>
                    <label class="form-check-label" for="">
                      Cọc 10% tổng giá trị đơn hàng
                    </label>
                  </div>
                  <small style="color:red">*Lưu ý: Giá sản phẩm có thể thay đổi tùy theo phương thức thanh toán.<br>
                    Thanh toán toàn bộ để có được mức giá tốt nhất.
                  </small>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                  <button type="submit" name="pmt" class="btn btn-primary">Xác nhận</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body">
          <?php
          $cart = $db->query("SELECT count(distinct p_id) as ssp, sum(unit + book) as slm FROM `cart` WHERE `u_id` = '$u_id'")->fetch();
          ?>
          <div class="d-flex justify-content-between">
            <h5 class="font-weight-medium mb-3">Số sản phẩm: </h5>
            <p><?= $cart['ssp'] ?></p>
          </div>
          <div class="d-flex justify-content-between">
            <h5 class="font-weight-medium mb-3">Tổng số lượng: </h5>
            <p><?= $cart['slm'] ?></p>
          </div>
          <hr class="mt-0">
          <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Phí dịch vụ:
              <small class="btn btn-default pb-1 p-0 m-0" data-toggle="tooltip" data-placement="right" title="Phí xử lý giao dịch (4.5% giá trị đơn hàng)">
                <i class="fa-solid fa-circle-question"></i>
              </small>
            </h6>
            <h6 class="font-weight-medium"><?= number_format($tam * 0.045) . " VND" ?></h6>
          </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Tổng tiền: </h5>
            <h5 class="font-weight-bold"><?= number_format($tam * 1.045) . " VND" ?></h5>
          </div>
          <div class="d-flex justify-content-between mt-2">
            <h5>Cần cọc trước: </h5>
            <h5><?php
                if ($payment == '10%') {
                  echo number_format($tam * 1.045 * 0.1) . " VND";
                } else if ($payment == '50%') {
                  echo number_format($tam * 1.045 * 0.5) . " VND";
                } else {
                  echo number_format($tam * 1.045) . " VND";
                }
                ?></h5>
          </div>
          <div class="text-center m-1">
            <div class="">
              <img src="img/QRCODE.jpg" alt="" style="width:50%">
            </div>
            <span style="color:deepskyblue">Nội dung giao dịch:<br> SDT Tên Hàng Số Lượng</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Fill address -->
    <div class="col-lg-8">
      <div class="mb-4">
        <h4 class="font-weight-semi-bold mb-4">Địa chỉ nhận hàng</h4>
        <form action="process/xl_order.php" method="POST">
          <div class="row">
            <div class="col-md-6 form-group">
              <?php
              if (isset($_GET['stock']) == 'true') {
                $for = 'stock';
              } else if (isset($_GET['stock']) == 'false') {
                $for = 'gb';
              } else {
                $for = '';
              }
              ?>
              <input type="hidden" name="saleFor" value="<?= $for ?>">
              <input type="hidden" name="process" value="<?= $tam * 0.045 ?>">
              <label>Tên người nhận</label>
              <input class="form-control" name="o_name" type="text" value="<?= $in4['f_name'] . " " . $in4['l_name'] ?>" placeholder="Tên người nhận" required>
            </div>
            <div class="col-md-6 form-group">
              <label>E-mail</label>
              <input class="form-control" name="o_mail" type="email" value="<?= $in4['email'] ?>" placeholder="Hòm thư điện tử" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Số điện thoại</label>
              <input class="form-control" name="o_phone" type="text" value="<?= $in4['phone'] ?>" placeholder="Số điện thoại người nhận" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Số nhà</label>
              <input class="form-control" name="o_no" type="text" value="<?= $in4['no'] ?>" placeholder="Số nhà" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Đường/Phố/Xóm</label>
              <input class="form-control" name="o_street" type="text" value="<?= $in4['street'] ?>" placeholder="Đường/Phố/Xóm" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Xã/Phường/Thị trấn</label>
              <input class="form-control" name="o_district" type="text" value="<?= $in4['district'] ?>" placeholder="Xã/Phường/Thị trấn" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Quận/Huyện</label>
              <input class="form-control" name="o_ward" type="text" value="<?= $in4['ward'] ?>" placeholder="Quận/Huyện" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Tỉnh/Thành phố</label>
              <input class="form-control" name="o_city" type="text" value="<?= $in4['city'] ?>" placeholder="Tỉnh/Thành phố" required>
            </div>
            <div class="col-md-12 form-floating">
              <textarea class="form-control" name="note" placeholder="Ghi chú cho đơn hàng hoặc mô tả địa chỉ giao hàng" id="floatingTextarea2" style="height: 100px"></textarea>
              <label for="floatingTextarea2"> Ghi chú</label>
            </div>
          </div>
          <div class=" col-md-12 text-center mt-3">
            <?php
            if ($loi == true) {
            ?>
              <button type="submit" name="order" disable class="btn btn-outline-danger w-30">
                <i class="fas fa-regular fa-cart-shopping"></i>
                Đặt hàng
              </button>
            <?php
            } else {
            ?>
              <button type="submit" name="order" class="btn btn-outline-primary w-30">
                <i class="fas fa-regular fa-cart-shopping"></i>
                Đặt hàng
              </button>
            <?php
            }
            ?>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>