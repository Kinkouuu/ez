<?php
require_once("template/core.php");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <div class="col-md-2">
                    <a class="navbar-brand" href="#">
                        <img src="img/logo.png" alt="" style="width:100%">
                    </a>
                </div>
                <div class="col-md-10 ">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-7">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-between">
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="?action=groupbuy">Group buy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="?action=timnguonhang">Tìm nhà cung cấp</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="?action=homthugopy">Hòm thư góp ý</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="?action=gioithieu">Giới thiệu</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 m-auto">
                                    <form action="process/xl_search.php" method="POST">
                                        <div class="input-group">
                                            <input type="text" name ="search" class="form-control" placeholder="Nhập tên sản phẩm">
                                            <div class="input-group-append">
                                                <button class="input-group-text bg-transparent text-primary">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2 m-auto">
                                    <div class="dropdown  dropstart">
                                        <button class="btn btn-outline-secondary rounded-circle float-end" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-user"></i>
                                        </button>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $u_id = $_SESSION['user'];
                                            // echo $u_id;
                                            $user = $db->query("SELECT * FROM `user` WHERE `u_id` = '$u_id'")->fetch();
                                        ?>
                                            <span><?= $user['f_name'] . " " . $user['l_name'] ?></span>
                                            <ul class="dropdown-menu border border-0" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="?action=giohang">
                                                        <i class="fas fa-cart-shopping"></i>
                                                        Giỏ hàng
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="?action=donhang">
                                                        <i class="fa-sharp fa-solid fa-table-list"></i>
                                                        Đơn hàng
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="">
                                                        <i class="fas fa-gear"></i>
                                                        Cá nhân
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="logout.php">
                                                        <i class="fa-solid fa-power-off"></i>
                                                        Đăng xuất
                                                    </a>
                                                </li>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <ul class="dropdown-menu border border-0" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="signin.php">Đăng nhập</a></li>
                                                <li><a class="dropdown-item" href="signup.php">Đăng kí</a></li>
                                            </ul>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>