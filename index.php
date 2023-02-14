<?php
require_once("layout/header.php");
require_once("layout/nav.php");

?>

<div class="container-fluid pt-5">
  <div class="row">
    <div class="col-md-12">
    <?php
	if (isset($_GET['action'])) {
    $tam = $_GET['action'];
  } else {
    $tam = '';
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
  require_once("view/cart.php");
} elseif ( $tam == 'thanhtoan'){
  require_once("view/ipay.php");
}
?>
    </div>
  </div>

</div>

<?php
require_once ("layout/footer.php");
require_once ("layout/end.php");
?>
