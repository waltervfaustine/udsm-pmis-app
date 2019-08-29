<?php
    global $session;
?>

<form class="form-signin" pb-autologin="true" autocomplete="off" action="../auth/op/passrecproc.php" method="post">
    <img class="brand-img mb-4" src="../../assets/brand.png" alt="brand">
    <div id="fogpass_login_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
    <label for="email" class="sr-only">Type your email address...</label>
    <input name="fogpass_email" type="fogpass_email" id="fogpass_email" class="form-control" placeholder="Type your email address..." autofocus="" pb-role="username" name="email">
    <br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit" pb-role="submit" name="recpassword_btn">Recover your password</button>
        <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
        <div class="bs-docs-example">
    </div>
</form>