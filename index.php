<?php
require_once("layout/header.php");
require_once("layout/nav.php");
require_once("layout/menu.php");

?>

<div class="container-fluid pt-3">
  <div class="row">
    <div class="col-md-12">
    <?php
	if (isset($_GET['action'])) {
    $tam = $_GET['action'];
  } else {
    $tam = '';
  }
 if($tam != "giohang"){
  unset($_SESSION['s_id']); // xoa session giam gia khi leave khoi trang cart
 } 
if ($tam == '') {
  require_once("view/home.php");
}elseif ($tam == 'gioithieu'){
  require_once("view/about.php");
} elseif ($tam == 'start-sourcing') {
  require_once("view/sourcing.php");
} elseif ($tam == 'lienhe') {
  require_once("view/contact.php");
} else if ( $tam == 'danhmucsanpham') {
  require_once("view/cate_type.php");
} elseif ( $tam == 'thongtinsanpham'){
  require_once("view/product.php");
} elseif ( $tam == 'giohang'){
  require_once("view/ipay.php");
} elseif ( $tam == 'donhang'){
  require_once("view/order.php");
}elseif ( $tam == 'chitietdonhang'){
  require_once("view/detail.php");
}elseif ( $tam == 'groupbuy'){
  require_once("view/groupbuy.php");
}elseif ( $tam == 'homthugopy'){
  require_once("view/contact.php");
}
elseif ( $tam == 'timnguonhang'){
  require_once("view/sourcing.php");
}
elseif ( $tam == 'thongtincanhan'){
  require_once("view/profile.php");
}else{
  require_once("view/type.php");
}

?>
    </div>
  </div>

</div>

<?php
require_once ("layout/footer.php");
require_once ("layout/end.php");
?>
