<h2 class="text-center">---Đặt hàng---</h2>
<?php
$in4 = $db->query("SELECT * FROM `user` WHERE `u_id` = '$u_id'")->fetch();
?>
<div class="container-fluid pt-5 border border-top">
  <div class="row px-xl-5">
    <div class="col-lg-8">
      <div class="mb-4">
        <h4 class="font-weight-semi-bold mb-4">Địa chỉ nhận hàng</h4>
        <div class="row">

          <div class="col-md-6 form-group">
            <label>Tên người nhận</label>
            <input class="form-control" type="text" value="<?= $in4['f_name'] . " " . $in4['l_name'] ?>" placeholder="Tên người nhận">
          </div>
          <div class="col-md-6 form-group">
            <label>E-mail</label>
            <input class="form-control" type="text" value="<?= $in4['email'] ?>" placeholder="Hòm thư điện tử">
          </div>
          <div class="col-md-6 form-group">
            <label>Số điện thoại</label>
            <input class="form-control" type="text" value="<?= $in4['phone'] ?>" placeholder="Số điện thoại người nhận">
          </div>
          <div class="col-md-6 form-group">
            <label>Số nhà</label>
            <input class="form-control" type="text" value="<?= $in4['no'] ?>" placeholder="Số nhà">
          </div>
          <div class="col-md-6 form-group">
            <label>Đường/Phố/Xóm</label>
            <input class="form-control" type="text" value="<?= $in4['street'] ?>" placeholder="Đường/Phố/Xóm">
          </div>
          <div class="col-md-6 form-group">
            <label>Xã/Phường/Thị trấn</label>
            <input class="form-control" type="text" value="<?= $in4['district'] ?>" placeholder="Xã/Phường/Thị trấn">
          </div>
          <div class="col-md-6 form-group">
            <label>Quận/Huyện</label>
            <input class="form-control" type="text" value="<?= $in4['ward'] ?>" placeholder="Quận/Huyện">
          </div>
          <div class="col-md-6 form-group">
            <label>Tỉnh/Thành phố</label>
            <input class="form-control" type="text" value="<?= $in4['city'] ?>" placeholder="Tỉnh/Thành phố">
          </div>
          <div class="col-md-12 form-floating">
            <textarea class="form-control" placeholder="Ghi chú cho đơn hàng hoặc mô tả địa chỉ giao hàng" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2"> Ghi chú</label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card border-secondary mb-5">
        <div class="card-header bg-success bg-opacity-50 border-0">
          <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
        </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fas fa-money-check-dollar"></i> Chọn phương thức thanh toán 
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <div class="card-body">
          <h5 class="font-weight-medium mb-3">Products</h5>
          <div class="d-flex justify-content-between">
            <p>Lò xo vàng</p>
            <p>3.000 VND</p>
          </div>
          <hr class="mt-0">
          <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 class="font-weight-medium">3.000 VND</h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium">15.000 VND</h6>
          </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 class="font-weight-bold">18.000 VND</h5>
          </div>
          <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
        </div>
      </div>
    </div>
  </div>
</div>