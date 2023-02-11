<?php
require_once("layout/header.php");
?>
<div class="container-fluid height-vh bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 300px">
    <div class="form-container mt-5">
      <div class="form-icon"><i class="fa fa-user"></i></div>
      <h3 class="title" style="font-family: 'Font Awesome 5 Free';">Đăng nhập</h3>
      <form class="form-horizontal" action="process/xl_signin.php" method="POST">
        <div class="form-group">
          <label  class="form-label">Tài khoản</label>
          <input class="form-control" name = "acc" type="text" placeholder="Email hoặc Số điện thoại">
        </div>
        <div class="form-group">
          <label class="form-label">Mật khẩu</label>
          <input class="form-control" name="pass" type="password" placeholder="Nhập mật khẩu">
        </div>
        <button type="submit" name="signIn" class="btn btn-default mb-2">Đăng nhập</button>
        <a href="signup.php">Đăng kí tài khoản mới.</a>
      </form>
    </div>
  </div>
</div>
<?php
require_once("layout/end.php");
?>
