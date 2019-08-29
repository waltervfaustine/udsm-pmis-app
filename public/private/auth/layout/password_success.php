<form class="form-signin" pb-autologin="true" autocomplete="off" action="./" method="post">
        <?php if(!empty($_SESSION['recover-email'])): ?>
            <h1 class="h3 mb-3 font-weight-normal verification-verified"> 
                <?php 
                    if(isset($_SESSION['recover-message'])) {
                        echo $_SESSION['recover-message']; 
                    }
                ?>
            </h1>
        <?php endif; ?>
    <button class="btn btn-lg btn-primary btn-block btn-logout" type="submit" pb-role="submit" name="success-submit">Back To Login</button>
        <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
        <div class="bs-docs-example">
    </div>
</form>