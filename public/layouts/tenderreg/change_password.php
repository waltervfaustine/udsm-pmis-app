<?php global $session; ?>

<div class="col-md-6">
    <div id="" class="region region-content">
        <div id="change-form-div" class="login-form-div">
            <div id="public_login_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
            <form class="form-forgotpassword form-control login-centering-div" method="POST" action="./op/chpassop.php">
                <h2 class="d-flex justify-content-center form-signin-heading">Change Password</h2>
                <label for="ch_password" class="sr-only">Password</label>
                <p><input type="password" id="ch_password" name="ch_password" class="form-control" placeholder="Password"></p>
                <label for="ch_confirm_password" class="sr-only">Confirm Password</label>
                <p><input type="password" id="ch_confirm_password" name="ch_confirm_password" class="form-control" placeholder="Confirm Password"></p>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="change_password_btn" name="change_password_btn">Change Password</button>
                <br>
                 <div class="checkbox">
                    <label id="create-account" class="d-flex justify-content-center">
                        <a class="" href="pubtend.php">Click Here To Go Back To Sign In</a>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="d-flex justify-content-center">
                        <p class="mt-0 mb-3 text-muted">© 2018-2019</p>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
