<div class="container-fluid mb-2">
  <div class="row">
    <!-- <div class="col-lg-3 d-none d-lg-block">
      <?php
      $directories = $db->query("SELECT * FROM `cate` WHERE `cate` is null AND `type` is null ORDER BY `c_id` ASC");
      foreach ($directories as $direc) {
        $d = $direc['direc']
      ?>

        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary  text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 5vh; margin-top: -1px; padding: 0 30px;">
          <h6 class="m-0"><?= $d?></h6>
          <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav class="collapse navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
          <div class="navbar-nav w-100 overflow-hidden border-bottom" style="height: 45vh">
            <div class="nav-item dropdown">
            <?php
                $categories = $db->query("SELECT * FROM `cate` WHERE `cate` is not null AND `type` is null AND `direc` = '$d'");
                foreach ( $categories as $cate){
                  $c = $cate['cate'];
                
                  ?>
              <a href="#" class="d-flex justify-content-between nav-link bg-primary bg-opacity-50" data-toggle="dropdown">
                  <h6 class="m-0"><?= $c?></h6>
                  <i class="fa fa-angle-down float-right mt-1"></i>
              </a>
              <?php 
                } ?>
              <div class="dropdown-menu position-absolute bg-primary bg-opacity-25 border-0 rounded-0 w-100 m-0">
                <?php 
                  $types = $db->query("SELECT * FROM `cate` WHERE `type` is not null AND `cate` = '$c'");
                  foreach ( $types as $type ) {
                    $t = $type['type'];
                    ?>
                    <a href="" class="dropdown-item"><?= $t ?></a>
                    <?php }
                ?>
              </div>
            </div>
          </div>
        </nav>

      <?php
      }
      ?>
    </div> -->
    <div class="col-md-9 col-md-none">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 50vh;">
            <img class="img-fluid" src="img/landing.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
          </div>
          <div class="carousel-item" style="height: 50vh;">
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
    <div class="col-lg-3">
      
    </div>
  </div>
</div>