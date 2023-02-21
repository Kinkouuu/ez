<?php
if (!isset($_SESSION['admin'])){
  echo '<script>alert("You must login with admin account");window.location = "https://ezsupply.app/a/index.php";</script>';
}else{
  $a_id = $_SESSION['admin'];
}
?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color:gray" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large bg-light" onclick="w3_close()">
  <i class="fa-solid fa-users-gear"></i>
  ADMINISTRATOR
</button>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:#0c56f5"></i>
            <a href="https://ezsupply.app/a/product.php" class="nav-link" style="color:#0c56f5">Products
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:#628ff0"></i>
            <a href="https://ezsupply.app/a/user.php" class="nav-link" style="color:#628ff0">Users
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:#1ff2ef"></i>
            <a href="https://ezsupply.app/a/order.php" class="nav-link" style="color:#1ff2ef">Orders
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle"  style="color:#69f051" ></i>
            <a href="https://ezsupply.app/a/money.php" class="nav-link"  style="color:#69f051">Currency Exchange
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:lime"></i>
            <a href="https://ezsupply.app/a/statist.php" class="nav-link" style="color:lime">Revenue Statistics
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:yellow"></i>
            <a href="https://ezsupply.app/a/spending.php" class="nav-link" style="color:yellow">User's Spending
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:gold" ></i>
            <a href="https://ezsupply.app/a/cate.php" class="nav-link" style="color:gold">Category Type
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:orange"></i>
            <a href="https://ezsupply.app/a/factory.php" class="nav-link" style="color:orange">Supply Factory
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:pink"></i>
            <a href="https://ezsupply.app/a/sale.php" class="nav-link" style="color:pink">Voucher Discount
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:#f097a4"></i>
            <a href="https://ezsupply.app/a/sourcing.php" class="nav-link" style="color:#f097a4">Start Soucing
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:#eb3852"></i>
            <a href="https://ezsupply.app/a/shipment.php" class="nav-link" style="color:#eb3852">Shipment
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:red" ></i>
            <a href="https://ezsupply.app/a/logout.php" class="nav-link" style="color:red">Logout
            </a>
        </li>
      </ul>
</div>
<div id="main">

<div class="w3-teal mb-1">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" style="font: caption;" onclick="w3_open()">&#9776;</button>
  <a href="https://ezsupply.app/a/home.php" class="w3-button w3-teal w3-xlarge" style="border: none;text-decoration:none; color: White;font: caption;"><i class="fa-solid fa-house-chimney"></i> HOME</a>
</div>

