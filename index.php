<?php
require_once("layout/header.php");
require_once("layout/nav.php");
require_once("layout/menu.php");
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
}elseif ($tam == 'about-us'){
  require_once("view/about.php");
} elseif ($tam == 'start-sourcing') {
  require_once("view/sourcing.php");
} elseif ($tam == 'contact-us') {
  require_once("view/contact.php");
} else {
  require_once("view/cate_type.php");
}
?>
    </div>
  </div>

</div>

<?php
require_once ("layout/footer.php");
require_once ("layout/end.php");
?>
