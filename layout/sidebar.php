<div class="container-fluid mb-2">
  <div class="row">
    <div class="col-lg-10" style="height: 30vh;">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="" src="img/landing.jpg">
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="img/product.jpg">
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="img/startsourcing.jpg" >
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
    <div class="col-lg-2 text-center border p-0 overflow-auto" style="height:30vh">
      <h4 class="bg-primary text-white p-3">Danh mục sản phẩm</h4>
      <nav class="sidebar card py-2 mb-4 border border-0">
        <ul class="nav flex-column" id="nav_accordion">
          <?php
          $cates = $db->query("SELECT DISTINCT (cate) FROM `cate` WHERE `cate` is not null AND `type` is null ORDER BY `c_id`");
          foreach ($cates as $cate) {
            $c = $cate['cate'];
          ?>
            <li class="nav-item has-submenu">
              <a class="nav-link text-start" href="#">
                <i class="fa-solid fa-chevron-down"></i>
                <?= $c ?>
              </a>
              <ul class="submenu collapse">
                <?php
                $types = $db->query("SELECT * FROM `cate` WHERE `type` is not null AND `cate` = '$c'");
                foreach ($types as $type) {
                ?>
                  <li><a class="nav-link" href="?action=loaisanpham&loai=<?= $type['type'] ?>"><?= $type['type'] ?></a></li>

                <?php
                }
                ?>
              </ul>
            </li>
          <?php
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

      element.addEventListener('click', function(e) {

        let nextEl = element.nextElementSibling;
        let parentEl = element.parentElement;

        if (nextEl) {
          e.preventDefault();
          let mycollapse = new bootstrap.Collapse(nextEl);

          if (nextEl.classList.contains('show')) {
            mycollapse.hide();
          } else {
            mycollapse.show();
            // find other submenus with class=show
            var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
            // if it exists, then close all of them
            if (opened_submenu) {
              new bootstrap.Collapse(opened_submenu);
            }
          }
        }
      }); // addEventListener
    }) // forEach
  });
  // DOMContentLoaded  end
</script>