<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Tìm nguồn hàng</h1>

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
        <form name="sentMessage" id="contactForm" novalidate="novalidate">
          <div class="control-group">
            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" id="phone" placeholder="Your Phone" required="required" data-validation-required-message="Please enter your phone" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="brandName" placeholder="Your Brand Name" required="required" data-validation-required-message="Please enter your brand name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="email" class="form-control" id="itemName" placeholder="Your Item Name" required="required" data-validation-required-message="Please enter your item name" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="subject" placeholder="Your Description" required="required" data-validation-required-message="Please enter your description" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="request" placeholder="Your Request" required="required" data-validation-required-message="Please enter your request" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="price" placeholder="Your Price" required="required" data-validation-required-message="Please enter your price" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="quantity" placeholder="Your Quantity" required="required" data-validation-required-message="Please enter your quantity" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input type="text" class="form-control" id="deposited" placeholder="Your Number of products deposited" required="required" data-validation-required-message="Please enter your deposited number" />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <label class="ml-xl-2" for="exampleFormControlFile1">Your Item Image</label>
            <input type="file" class="form-control" id="exampleFormControlFile1">
          </div>
          <div class="control-group">
            <label class="ml-xl-2 mt-3" for="exampleFormControlFile1">Your Item Date Opening</label>
            <input type="date" class="form-control" id="exampleFormControlFile2">
          </div>
          <div class="mt-3">
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
              Send
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
