<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Hòm thư góp ý</h1>
  </div>
</div>

<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <div class="col-lg-12 mb-5">
      <div class="contact-form">
        <div id="success"></div>
        <form name="sentMessage" id="contactForm" novalidate="novalidate">
          <div class="control-group">
            <input type="text" class="form-control" id="name" placeholder="Họ tên" required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" id="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="subject" placeholder="Tiêu đề" required="required" data-validation-required-message="Please enter a subject" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <textarea class="form-control" rows="6" id="message" placeholder="Nội dung" required="required" data-validation-required-message="Please enter your message"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
              <i class="fas fa-envelopes-bulk"></i>
              GỬI
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>