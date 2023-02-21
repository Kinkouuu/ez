<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 10vh">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Hòm thư góp ý</h1>
    <?php
      if(isset($_GET['status'] )){
        echo "<span style='color:white;'>".$_GET['status']."</span>";
      }

    ?>
  </div>
</div>

<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <div class="col-lg-12 mb-5">
      <div class="contact-form">
        <div id="success"></div>
        <form name="sentMessage" action="process/xl_sendMail.php" method="POST">
          <div class="control-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu đề" required="required" data-validation-required-message="Please enter a subject" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <textarea class="form-control" rows="6" id="message" name="mess" placeholder="Nội dung" required="required" data-validation-required-message="Please enter your message"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div>
            <button  name ="send" class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
              <i class="fas fa-envelope"></i>
              Gửi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>