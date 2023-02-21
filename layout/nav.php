<link rel="stylesheet" href="css/custom.css">
<?php
require_once("template/core.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-info bg-radient bg-opacity-25 p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-between" style="height:auto">
                <div class="col-md-2 p-0" style="height:100%">
                    <a class="navbar-brand p-0" href="index.php">
                        <img class="p-0" src="img/new_logo.png" alt="" style="width:100%;height:100%">
                    </a>
                </div>
<<<<<<< HEAD
                <div class="col-md-9 p-2 m-auto">
=======
                <div class="col-md-9 m-auto">
>>>>>>> 60ce36fb0f9deb9d1e26b967035ae881c7d69bda
                    <form action="process/xl_search.php" method="POST">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Nhập tên sản phẩm">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 d-flex m-auto p-0">
                    <div class="dropdown text-center" style="max-width: 70%;">
                        <img class=" dropbtn rounded-circle" src="img/avatar.png" alt="" style="max-width: 50%;width:auto">
                        <div class="dropdown-content bg-info bg-gradient bg-opacity-50">
                            <?php
                            if (isset($_SESSION['user'])) {
                                $u_id = $_SESSION['user'];
                                $user = $db->query("SELECT * FROM `user` WHERE `u_id` = '$u_id'")->fetch();
                            ?>
                                <span><?= $user['f_name'] . " " . $user['l_name'] ?></span>
                                <a class="dropdown-item" href="?action=giohang">
                                    <i class="fas fa-cart-shopping"></i>
                                    Giỏ hàng
                                </a>
                                <a class="dropdown-item" href="?action=donhang">
                                    <i class="fa-sharp fa-solid fa-table-list"></i>
                                    Đơn hàng
                                </a>
                                <a class="dropdown-item" href="?action=thongtincanhan">
                                    <i class="fas fa-gear"></i>
                                    Cá nhân
                                </a>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fa-solid fa-power-off"></i>
                                    Đăng xuất
                                </a>
                        </div>
                    <?php
                            } else {
                    ?>
                        <a class="dropdown-item" href="signin.php">
                            <i class="fas fa-right-to-bracket"></i>
                            Đăng nhập
                        </a>
                        <a class="dropdown-item" href="signup.php">
                            <i class="fas fa-regular fa-user-plus"></i>
                            Đăng kí
                        </a>
                    <?php
                            }
                    ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</nav>