<?php
$user = $db->query("SELECT * FROM `user` WHERE `u_id` ='$u_id'")->fetch();
?>
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Profile</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form action= "xl_upProfile.php" method="POST" name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Mã khách hàng:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id" readonly value="<?= $u_id ?>" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Số điện thoại:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="phone" placeholder="Your Phone Number" readonly value="<?= $user['phone'] ?>" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Họ và tên đệm: </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="firstName" placeholder="Your First Name" value="<?= $user['f_name'] ?>" required="required" data-validation-required-message="Please enter your first name" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Tên khách hàng:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="lastName" placeholder="Your Last Name" value="<?= $user['l_name'] ?>" required="required" data-validation-required-message="Please enter your last name" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Email:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="mail" placeholder="Your Mail Address" value="<?= $user['email'] ?>" required="required" data-validation-required-message="Please enter your mail" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Tỉnh/Thành phố: </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="city" placeholder="Your City/ Province" value="<?= $user['city'] ?>" required="required" data-validation-required-message="Please enter your city/ province" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Quận/Huyện: </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="district" placeholder="Your District" value="<?= $user['district'] ?>" required="required" data-validation-required-message="Please enter your district" />
                            <p class="help-block text-danger"></p>
                        </div>

                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Xã/Phường/Thị trấn:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="town" placeholder="Your Town" value="<?= $user['ward'] ?>" required="required" data-validation-required-message="Please enter your town" />
                            <p class="help-block text-danger"></p>
                        </div>

                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Đường/Phố/Thôn: </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="street" value="<?= $user['street'] ?>" placeholder="Your Street" required="required" data-validation-required-message="Please enter your street" />
                            <p class="help-block text-danger"></p>
                        </div>

                    </div>
                    <div class="control-group d-flex">
                        <div class="col-md-2">
                            <label for="">Số nhà: </label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="no" value="<?= $user['no'] ?>" placeholder="Your address no." required="required" data-validation-required-message="Please enter your address number" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                            <i class="fas fa-file-pen"></i>
                            Xác nhận
                        </button>
                    </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác thực tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required="required" data-validation-required-message="Please enter your password" />
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary" name="change">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
</form>