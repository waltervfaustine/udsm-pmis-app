<?php
    global $session;
?>

<form class="form-signin" pb-autologin="true" autocomplete="off" action="./op/chpassop.php" method="post">
    <img class="mb-4" src="../../assets/brand.png" alt="" width="72" height="72">
    <div id="chpassop_login_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
    <label for="ch_password" class="sr-only">Password</label>
    <input type="ch_password" id="ch_password" class="form-control" placeholder="Password" pb-role="password" name="ch_password">
    </br>
    <label for="ch_confirm_password" class="sr-only">Confirm Password</label>
    <input type="ch_confirm_password" id="ch_confirm_password" class="form-control" placeholder="Confirm Password" pb-role="password" name="ch_confirm_password">
    </br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" pb-role="submit" name="changepass_btn">Change Password</button>
        <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
        <div class="bs-docs-example">
    </div>
    <div class="checkbox mb-3">
    </div>
</form>