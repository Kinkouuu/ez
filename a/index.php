<?php 
    require_once ("control/head.php");
?>
<div class="container">
    <div class = "position-absolute top-50 start-50 translate-middle">
        <form action="model/prs_sign.php" method="POST" class="" >
            <div class="text-center">
                <h3>ADMIN</h3>
                <h5>Login to start your session</h5>
            </div>
            <div class="mb-3">
                <label class="form-label">Account</label>
                <div class="d-flex align-items-center">
                <input class="border rounded-start border-2 border-end-0" name="account" placeholder=" Admin account" style="width: 100%;height:30px">
                <span class="border rounded-end bg-light border-2 border-start-0" style="height: 30px;width:15%; text-align:center"><i class="fas fa-user"></i></span>
            </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="d-flex align-items-center">
                <input type="password" class="border rounded-start border-2 border-end-0" name="pass" placeholder=" Password" style="width: 100%;height:30px">
                <span class="border rounded-end bg-light border-2 border-start-0" style="height: 30px;width:15%; text-align:center"><i class="fas fa-key"></i></span>
            </div>
            <button name = "signin" type="submit" class="btn btn-primary mt-1">Sign In</button>
        </form>
    </div>
</div>
