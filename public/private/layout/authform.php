<?php
    global $session;
?>

<form class="form-signin" pb-autologin="true" autocomplete="off" action="../auth/login/index.php" method="post">
    <img class="brand-img mb-4" src="../../assets/brand.png" alt="brand" >
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <div id="admin_login_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" class="form-control" placeholder="Email address" autofocus="" pb-role="username" name="email">
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" placeholder="Password" pb-role="password" name="password">
    <br>
    <!-- <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember (NOTE:If this is private computer)
        </label>
    </div> -->
    <button class="btn btn-lg btn-primary btn-block" type="submit" pb-role="submit" name="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
        <div class="bs-docs-example">
    </div>
    <div class="checkbox mb-3">
        <label>
            <a href="../auth/fogpass.php">Forgot your password?</a>
        </label>
    </div>
</form>