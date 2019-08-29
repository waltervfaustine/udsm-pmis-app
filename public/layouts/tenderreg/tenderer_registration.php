<?php
    global $session;
    global $DBInstance;
?>

<div class="col-md-6 tndr-reg-form">
    <div id="public-reg" class="region region-content">
        <div id="public_news_alert" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
        <form id="tbcreg_form" name="tbcreg_form" action="./op/actiontndrr.php?pg=1" method="POST" class="form-control form-signin">
            <h2 id="tender_reg_title" class="form-signin-heading d-flex justify-content-center">Please Create Account</h2>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="tbcreg_category">Supply Category</label>
                </div>
                <?php $businessCategories = BusinessCategory::getAll(); ?>
                <select class="custom-select" id="tbreg_category" name="tbreg_category">
                    <option selected>Choose...</option>
                    <?php foreach($businessCategories as $businessCategory): ?>
                        <option value="<?php echo $businessCategory->id; ?>"> <?php echo $businessCategory->title; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <!-- <label for="tbcreg_firstname">First name</label> -->
                    <input type="text" class="form-control" id="tbcreg_firstname" name="tbcreg_firstname" placeholder="Firstname" value="<?php if(isset($_SESSION['tbcreg_firstname'])) { if(!empty($_SESSION['tbcreg_firstname'])) { echo $_SESSION['tbcreg_firstname']; } } ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <!-- <label for="tbcreg_middlename">Middlename</label> -->
                    <input type="text" class="form-control" id="tbcreg_middlename" name="tbcreg_middlename" placeholder="Middlename" value="<?php if(isset($_SESSION['tbcreg_middlename'])) { if(!empty($_SESSION['tbcreg_middlename'])) { echo $_SESSION['tbcreg_middlename']; } } ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <!-- <label for="tbcreg_lastname">Lastname</label> -->
                    <input type="text" class="form-control" id="tbcreg_lastname" name="tbcreg_lastname" placeholder="Lastname" value="<?php if(isset($_SESSION['tbcreg_lastname'])) { if(!empty($_SESSION['tbcreg_lastname'])) { echo $_SESSION['tbcreg_lastname']; } } ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <!-- <label for="tbcreg_email">Email</label> -->
                    <input type="email" id="tbcreg_email" name="tbcreg_email" class="form-control" placeholder="Email address" value="<?php if(isset($_SESSION['tbcreg_email'])) { if(!empty($_SESSION['tbcreg_email'])) { echo $_SESSION['tbcreg_email']; } } ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <!-- <label for="tbcreg_phonecall">Phonecall</label> -->
                    <input type="phone" id="tbcreg_phonecall" name="tbcreg_phonecall" class="form-control" placeholder="Phonecall" value="<?php if(isset($_SESSION['tbcreg_phonecall'])) { if(!empty($_SESSION['tbcreg_phonecall'])) { echo $_SESSION['tbcreg_phonecall']; } } ?>">
                </div>

                <div class="col-md-6 mb-3">
                   <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="tbcreg_gender">Gender</label>
                        </div>
                        <select class="custom-select" id="tbcreg_gender" name="tbcreg_gender">
                            <option selected>Choose...</option>
                            <option value="M" >Male</option>
                            <option value="F" >Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <!-- <label for="tbcreg_username">Username</label> -->
                    <input type="text" id="tbcreg_username" name="tbcreg_username" class="form-control" placeholder="Username" value="<?php if(isset($_SESSION['tbcreg_username'])) { if(!empty($_SESSION['tbcreg_username'])) { echo $_SESSION['tbcreg_username']; } } ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <!-- <label for="tbcreg_passcode">First name</label> -->
                    <input type="password" class="form-control" id="tbcreg_passcode" name="tbcreg_passcode" placeholder="Password">
                    <span id="password_message" >Echo</span>
                </div>
                <div class="col-md-6 mb-3">
                    <!-- <label for="tbcreg_passcode_confirm">Confirm Password</label> -->
                    <input type="password" class="form-control" id="tbcreg_passcode_confirm" name="tbcreg_passcode_confirm" placeholder="Confirm Password">
                </div>

                <div class="col-md-6 mb-3">
                    <!-- <label for="tbcreg_idcard">ID Card Number</label> -->
                    <input type="text" class="form-control" id="tbcreg_idcard" name="tbcreg_idcard" placeholder="ID Card" value="<?php if(isset($_SESSION['tbcreg_idcard'])) { if(!empty($_SESSION['tbcreg_idcard'])) { echo $_SESSION['tbcreg_idcard']; } } ?>">
                </div>

                <div class="col-md-6 mb-3">
                   <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="tbcreg_idcard_type">ID Type</label>
                        </div>

                        <?php $identificationCards = IdentificationCard::getAll(); ?>
                        <select class="custom-select" id="tbcreg_idcard_type" name="tbcreg_idcard_type">
                            <option selected>Choose...</option>
                            <?php foreach($identificationCards as $identificationCard): ?>
                                <option value="<?php echo $identificationCard->id; ?>"> <?php echo $identificationCard->name; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3 d-none">
                <!-- <label for="tbcreg_status">ID Card Number</label> -->
                <input type="text" class="form-control" id="tbcreg_status" name="tbcreg_status" placeholder="Status">
            </div>
            <div class="col-md-12 mb-3  d-none">
                <!-- <label for="tbcreg_token">ID Card Number</label> -->
                <input type="text" class="form-control" id="tbcreg_token" name="tbcreg_token" placeholder="Token" >
            </div>
            <div class="col-md-12 mb-3  d-none">
                <!-- <label for="tbcreg_prof_img">ID Card Number</label> -->
                <input type="text" class="form-control" id="tbcreg_prof_img" name="tbcreg_prof_img" placeholder="Profile" >
            </div>
            <div class="col-md-12 mb-3  d-none">
                <!-- <label for="tbcreg_verification">ID Card Number</label> -->
                <input type="text" class="form-control" id="tbcreg_verification" name="tbcreg_verification" placeholder="Verification" >
            </div>

            <?php $roles = Role::getAll(); ?>
            <?php foreach($roles as $role): ?>
                <?php if($role->name == "Tenderer"): ?>
                    <div class="col-md-12 mb-3 d-none">
                        <!-- <label for="tbcreg_role_id">ID Card Number</label> -->
                        <input type="text" class="form-control" id="tbcreg_role_id" name="tbcreg_role_id" placeholder="Role ID" value="<?php echo $role->id?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <div class="checkbox">
                <label>
                    <input id="tbcreg_agree" name="tbcreg_agree" type="checkbox" value="save_login_locally"> By Click you agree <a href="termsandconditions.php">terms and conditions</a> set by University of Dar-es-salaam(UDSM) for PMIS access
                </label>
            </div>
            <button id="add_tenderer_information" name="add_tenderer_information" class="btn btn-lg btn-primary btn-block" type="submit">Create PMIS Account</button>
            <div class="checkbox">
                <label id="create-account" class="d-flex justify-content-center">
                    <a class="" href="pubtend.php">Click Here To Go Back To Sign In</a>
                </label>
            </div>
        </form>
    </div>
</div>