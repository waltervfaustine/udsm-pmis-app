<form class="form-signin" pb-autologin="true" autocomplete="off" action="../../logout/index.php" method="post">
    <img class="mb-4" src="../../assets/brand.png" alt="" width="72" height="72">
        <?php if(!empty($_SESSION['login-email'])): ?>
            <h1 class="h3 mb-3 font-weight-normal verification-unverified"> 
                Failed to send recovering link to the following email
            </h1>
            <h1 class="h3 mb-3 font-weight-normal verification-email"> 
                <?php echo $_SESSION['login-email']; ?>
            </h1>
        <?php endif; ?>
    <button class="btn btn-lg btn-primary btn-block btn-logout" type="submit" pb-role="submit" name="submit">Back To Login</button>
        <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
        <div class="bs-docs-example">
    </div>
</form>