<?php global $session; ?>

<div class="col-md-6">
    <div id="" class="region region-content">
        <div id="login-form-div" class="login-form-div">
            <div id="public_login_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
            <form class="form-signin form-control login-centering-div" method="POST" action="./layouts/auth/login.php">
                <h2 class="d-flex justify-content-center form-signin-heading">Please sign in</h2>
                <label for="stakeholder_email" class="sr-only">Email address</label>
                <p><input type="email" id="stakeholder_email" name="stakeholder_email" class="form-control" placeholder="Email address"></p>
                <label for="stakeholder_passcode" class="sr-only">Password</label>
                <p><input type="password" id="stakeholder_passcode" name="stakeholder_passcode" class="form-control" placeholder="Password"></p>
                <!-- <div class="hidden checkbox">
                    <label>
                    <p><input type="checkbox" value="remember-me"> Remember me (<strong>NOTE</strong>:If this is private computer)</p>
                    </label>
                </div> -->

                <button class="btn btn-lg btn-primary btn-block" type="submit" id="stakeholder_login" name="stakeholder_login">Sign in</button>
                <div class="checkbox">
                    <label id="create-account" class="d-flex justify-content-center">
                        <a class="" href="tenderreg.php">Already have an account?</a>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="d-flex justify-content-center">
                        <p id="login-bottom-year" class="text-muted">© 2018-2019</p>
                    </label>
                    <label class="d-flex justify-content-center">
                        <a href="fogpass.php">Forgot your password?</a>
                    </label>
                </div>
            </form>
            <a href="../public/private/auth"><button class="btn btn-lg btn-info btn-block" type="" id="" name="">Login For PMIS Authorized Users Only</button></a>
        </div>
    </div>
</div>
