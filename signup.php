<?php
require_once("layout/header.php");
?>
  <div class="container-fluid height-100vh bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <div class="form-container w-100 mt-5">
        <div class="form-icon"><i class="fa fa-user"></i></div>
        <h3 class="title" style="font-family: 'Font Awesome 5 Free';">Đăng kí</h3>
        <form class="form-horizontal" action="process/xl_signup.php" method="POST">
          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" type="text" name="f_name" placeholder="Họ & Đệm" required>
              </div>
            </div>
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" type="text" name="l_name" placeholder="Tên" required>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" required>
              </div>
            </div>
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Tài khoản gmail" required>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group"> 
                <input class="form-control" name="pass" type="password" placeholder="Mật khẩu" required>
              </div>
            </div>
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" name="repass" type="password" placeholder="Nhập lại mật khẩu" required>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" name="city" type="text" placeholder="Tỉnh/Thành phố" required>
              </div>
            </div>
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" name="district" type="text" placeholder="Quận/Huyện" required>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" name="ward" type="text" placeholder="Phường/Xã/Thị trấn" required>
              </div>
            </div>
            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" name="street" type="text" placeholder="Đường/Xóm/Thôn" required>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">

            <div class="col-xl-2 col-md-12 text-center">
              <div class="form-group">
                <input class="form-control" name="stNo" type="text" placeholder="Số nhà" required>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-12 text-center">
              <button type="submit" name ="signUp" class="btn btn-default mb-1">Đăng kí</button>
              <a href="signin.php">Bạn đã có tài khoản?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
require_once("layout/end.php");
?>