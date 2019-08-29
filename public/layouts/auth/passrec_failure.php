<div class="col-md-6">
    <div class="verified text-center">
        <form class="form-signin" pb-autologin="true" autocomplete="off" action="tenderreg.php" method="post">
            <p>
                <img class="text-center .img-responsive" src="assets/failed.png" width="150" alt="Registration Successfully">
            </p>
            <p class="h3 mb-3 font-weight-normal "> 
                <?php echo $_SESSION['stk-message']; ?>
            </p>
            <br>
            <button class="btn btn-lg btn-primary btn-block btn-logout" type="submit" pb-role="submit" name="success-submit">Register</button>
            <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
            </div>
        </form>
    </div>
</div>
