<?php global $session; ?>

<div class="col-md-6">
    <div class="unverified">
        <form class="text-center centering-div" pb-autologin="true" autocomplete="off" action="pubtend.php" method="post">
            <?php if(isset($_SESSION['stakeholder-email']) && isset($_SESSION['stakeholder-fullname'])): ?>
                <?php if(!empty($_SESSION['stakeholder-email'])): ?>
                    <h1 class="h3 mb-3 font-weight-normal stakeholder-fullname"> 
                        <?php echo "PMIS Account for User <strong>".$_SESSION['stakeholder-fullname']."</strong> is successfully created. Please open your email <strong>".$_SESSION['stakeholder-email']."</strong> to verify your account."; ?>
                    </h1>
                    <p>
                        <img class="text-center .img-responsive" src="assets/green-tick.png" width="80" alt="Registration Successfully">
                    </p>
                <?php endif; ?>
            <?php endif; ?>
            <button class="btn btn-lg btn-primary btn-block btn-logout" type="submit" pb-role="submit" name="submit">Go Back To Login</button>
                <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
                <div class="bs-docs-example">
            </div>
        </form>
    </div>
</div>
