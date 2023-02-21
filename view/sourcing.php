<style>
  #inputTag {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
</style>
<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 10vh">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Tìm nguồn hàng</h1>
    <?php
      if(isset($_GET['status'])){
        echo '<span style="color:white">'.$_GET['status'].'</span>';
      }
    ?>
  </div>
</div>

<div class="container-fluid pt-5">
  <div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Điền thông tin</span></h2>
  </div>
  <div class="row px-xl-5">
    <div class="col-lg-12 mb-5">
      <div class="contact-form">
        <div id="success"></div>
        <form action="process/xl_sourcing.php" method="POST" enctype="multipart/form-data">
          <div class="control-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" name="brand" id="brandName" placeholder="Nhãn hàng" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" name="item" id="itemName" placeholder="Tên sản phẩm" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <textarea class="form-control" name="spec" placeholder="Mô tả sản phẩm" id="floatingTextarea" rows="4" cols="50"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <textarea class="form-control" name="request" placeholder="Yêu cầu về sản phẩm" id="floatingTextarea" rows="4" cols="50"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="number" class="form-control" name="price" id="price" placeholder="Giá khuyến nghị" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Số lượng đặt mua" required="required" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="number" class="form-control" name="deposit" id="deposited" placeholder="Số lượng đã được cọc trước" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group d-flex">
            <div class="col-md-2">
              <label for="inputTag">
                Hình ảnh mẫu <br />
                <i class="fa fa-2x fa-camera"></i>
                <input name="image" id="inputTag" type="file" />
                <span id="imageName"></span>
              </label>
            </div>
            <div class="col-md-10">
              <label class="ml-xl-2" for="exampleFormControlFile1">Ngày dự kiến mở bán</label>
              <input type="date" name="open" class="form-control" id="exampleFormControlFile2">
            </div>
          </div>
          <div class="mt-3">
            <button class="btn btn-primary py-2 px-4" name="send" type="submit" id="sendMessageButton">
              <i class="fas fa-envelope"></i>
              Gửi yêu cầu
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  let input = document.getElementById("inputTag");
  let imageName = document.getElementById("imageName")

  input.addEventListener("change", () => {
    let inputImage = document.querySelector("input[type=file]").files[0];

    imageName.innerText = inputImage.name;
  })
</script>