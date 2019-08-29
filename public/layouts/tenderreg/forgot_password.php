<?php global $session; ?>

<div class="col-md-6">
    <div id="" class="region region-content">
        <div id="fogpassword-form-div" class="login-form-div">
            <div id="rec_login_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
            <form class="form-forgotpassword form-control login-centering-div" method="POST" action="./op/passrecproc.php">
                <h2 class="d-flex justify-content-center form-signin-heading">Get New Password</h2>
                <label for="fogpass_email" class="sr-only">Email address</label>
                <p><input type="email" id="fogpass_email" name="fogpass_email" class="form-control" placeholder="Email address"></p>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="recpassword_btn" name="recpassword_btn">Recover Password</button>
                <br>
                <div class="checkbox">
                    <label class="d-flex justify-content-center">
                        <p class="mt-0 mb-3 text-muted">© 2018-2019</p>
                    </label>
                </div>
                <div class="checkbox">
                <label id="create-account" class="d-flex justify-content-center">
                    <a class="" href="pubtend.php">Go Back To Sign In</a>
                </label>
            </div>
            </form>
        </div>
    </div>
</div>
