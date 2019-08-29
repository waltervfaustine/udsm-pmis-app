<?php
    global $session;
?>

<div class="col-md-6">
    <div class="verified text-center">
        <form class="form-signin" pb-autologin="true" autocomplete="off" action="pubtend.php" method="post">
            <?php if(isset($_SESSION['stk-email']) && isset($_SESSION['stk-fullname'])): ?>
                <?php if(!empty($_SESSION['stk-email'])): ?>
                <p class="h3 mb-3 font-weight-normal "> 
                    <?php echo $_SESSION['stk-message']; ?>
                </p>
                <p>
                    <img class="text-center .img-responsive" src="assets/verified.jpg" width="150" alt="Registration Successfully">
                </p>
                <?php endif; ?>
            <?php endif; ?>
            
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-lg btn-primary btn-block btn-logout" type="submit" pb-role="submit" name="success-submit">Back To Login</button>
                </div>
            </div>
            <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
            </div>
        </form>
    </div>
</div>
