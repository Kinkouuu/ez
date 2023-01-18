<?php 
require_once("head.php")
?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color:gray" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large bg-light" onclick="w3_close()">
  <i class="fa-solid fa-users-gear"></i>
  ADMINISTRATOR
</button>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:blue"></i>
            <a href="#" class="nav-link" style="color:blue">Products
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:green"></i>
            <a href="#" class="nav-link" style="color:green">Users
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:darkcyan"></i>
            <a href="#" class="nav-link" style="color:darkcyan">Orders
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle"  style="color:cyan" ></i>
            <a href="#" class="nav-link"  style="color:cyan">Currency Exchange
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:lime"></i>
            <a href="#" class="nav-link" style="color:lime">Revenue Statistics
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:yellow"></i>
            <a href="#" class="nav-link" style="color:yellow">User's Spending
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:gold" ></i>
            <a href="http://localhost/ez/a/cate.php" class="nav-link" style="color:gold">Category Type
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:orange"></i>
            <a href="http://localhost/ez/a/factory.php" class="nav-link" style="color:orange">Supply Factory
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:pink"></i>
            <a href="#" class="nav-link" style="color:pink">Voucher Discount
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:Crimson"></i>
            <a href="#" class="nav-link" style="color:Crimson">Start Soucing
            </a>
        </li>
        <li class="w3-bar-item w3-button d-flex align-items-center">
          <i class="nav-icon far fa-circle" style="color:red" ></i>
            <a href="#" class="nav-link" style="color:red">Logout
            </a>
        </li>
      </ul>
</div>
<div id="main">

<div class="w3-teal mb-1">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" style="font: caption;" onclick="w3_open()">&#9776;</button>
  <a href="http://localhost/ez/a/home.php" class="w3-button w3-teal w3-xlarge" style="border: none;text-decoration:none; color: White;font: caption;"><i class="fa-solid fa-house-chimney"></i> HOME</a>
</div>

