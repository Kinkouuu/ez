<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>EZSUPPLY</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="img/favi.png" rel="icon">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
  <div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a href="#" class="btn">
        <img style="height: 38px" class="img-fluid" src="img/logo.jpg" alt="Image">
      </a>
    </div>
    <div class="col-lg-6 col-6 text-left">
      <form action="">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for products">
          <div class="input-group-append">
            <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
            </span>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-3 col-6 text-right">
      <a href="signin.html" class="btn border">
        <span class="badge">Login</span>
      </a>

      <a href="cart.html" class="btn border">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge">0</span>
      </a>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row border-top d-flex custom-center px-xl-5">
    <div>
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="#" class="btn">
          <img style="height: 38px" class="img-fluid" src="img/logo.jpg" alt="Image">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
            <a href="index.html" class="nav-item nav-link">Home</a>
            <a href="shop.html" class="nav-item nav-link">Group Buy</a>
            <a href="detail.html" class="nav-item nav-link">Start Sourcing</a>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            <a href="about.html" class="nav-item nav-link">About Us</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>

<div class="container-fluid mb-5">
  <div class="row px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
         data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
      </a>
      <nav
        class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
        id="navbar-vertical">
        <div class="navbar-nav w-100 overflow-hidden border-bottom" style="height: 410px">
          <div class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">Product <i
              class="fa fa-angle-down float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
              <a href="" class="dropdown-item">Switch</a>
              <a href="" class="dropdown-item">Spices</a>
              <a href="" class="dropdown-item">Packing Food</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="col-lg-9">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="img/landing.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
          </div>
          <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="img/landing.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
          </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid pt-5">
  <div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Item</span></h2>
  </div>
  <div class="row align-items-center px-xl-5">
    <div class="col-xl-4 col-md-12 d-flex justify-content-end">
        <img class="custom-img" src="img/test.png" alt="Ảnh SP"/>
    </div>
    <div class="col-xl-8 col-md-12">
      <h3>Tên SP</h3>
      <hr class="soft px-xl-5"/>
      <form class="form-horizontal">
        <div class="control-group">
          <label class="control-label"><span>420.000 VND</span></label>
          <div class="controls">
            <input type="number" class="span1" placeholder="Quantity"/>
            <button class="btn">
              <a href="cart.html" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>
                Add To Cart<span>(100 items in stock)</span>
              </a>
            </button>
          </div>
          <label class="control-label mt-2"><p>Thông tin SP</p></label>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
  <div class="row px-xl-5 pt-5">
    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
      <a href="#" class="btn">
        <img style="height: 66px" class="img-fluid" src="img/logo.jpg" alt="Image">
      </a>
      <p>The Marketplace to buy everything for your hobby.</p>
      <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>TP.Ho Chi Minh</p>
      <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Hotro@ezsupply.app</p>
      <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0916350289</p>
    </div>

    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
      <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
      <div class="d-flex flex-column justify-content-start">
        <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
        <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Group Buy</a>
        <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Start Sourcing</a>
        <a class="text-dark mb-2" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
        <a class="text-dark mb-2" href="about.html"><i class="fa fa-angle-right mr-2"></i>About Us</a>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
      <h5 class="font-weight-bold text-dark mb-4">Social Media</h5>
      <div class="d-flex justify-content-start">
        <a class="text-dark mb-2" href="https://discord.com/channels/1051011137304535090/1051011138076291099">
          <img src="https://img.icons8.com/color/48/null/discord-new-logo.png"/>
        </a>
        <a class="text-dark mb-2" href="https://www.youtube.com/channel/UCGRS295WOzmwHvpmzSExEFg">
          <img src="https://img.icons8.com/color/48/null/youtube-squared.png"/>
        </a>
        <a class="text-dark mb-2" href="https://www.facebook.com/ezsupplyvn">
          <img src="https://img.icons8.com/fluency/48/null/facebook.png"/>
        </a>
      </div>
    </div>

  </div>
  <div class="row border-top border-light mx-xl-5 py-4">
    <div class="col-md-6 px-xl-0">
      <p class="mb-md-0 text-center text-md-left text-dark">
        &copy; <a class="text-dark font-weight-semi-bold" href="#">EZSUPPLY</a>. All Rights Reserved. Designed
        by
        <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">LGBT+</a>
      </p>
    </div>
    <div class="col-md-6 px-xl-0 text-center text-md-right">

    </div>
  </div>
</div>

<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>
<script src="js/main.js"></script>
</body>

</html>