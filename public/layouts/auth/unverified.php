<div class="col-md-6">
    <div class="unverified">
        <form class="text-center centering-div" pb-autologin="true" autocomplete="off" action="../logout/index.php" method="post">
            <?php if(isset($_SESSION['stakeholder-email']) && isset($_SESSION['stakeholder-fullname'])): ?>
                <?php if(!empty($_SESSION['stakeholder-email'])): ?>
                    <h1 class="h3 mb-3 font-weight-normal stakeholder-fullname"> 
                        <?php echo $_SESSION['stakeholder-fullname']; ?>
                    </h1>
                    <h1 class="h3 mb-3 font-weight-normal stakeholder-email"> 
                        <?php echo $_SESSION['stakeholder-email']; ?>
                    </h1>
                    <h1 class="h3 mb-3 font-weight-normal stakeholder-unverified"> 
                        Account is unverified, Please follow the link in your email to verify your account.
                    </h1>
                <?php endif; ?>
            <?php endif; ?>
            <button class="btn btn-lg btn-primary btn-block btn-logout" type="submit" pb-role="submit" name="submit">Logout</button>
                <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
                <div class="bs-docs-example">
            </div>
        </form>
    </div>
</div>
