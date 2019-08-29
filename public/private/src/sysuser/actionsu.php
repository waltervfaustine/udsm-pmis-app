<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_system_user'])) {
            if(isset($_POST['su_dept_id']) && isset($_POST['su_firstname']) && isset($_POST['su_middlename']) && isset($_POST['su_lastname']) && isset($_POST['su_gender_id']) &&
            isset($_POST['su_email']) && isset($_POST['su_phonenumber']) && isset($_POST['su_username']) && isset($_POST['su_password']) && isset($_POST['su_confirm_password']) &&
            isset($_POST['su_role_id']) && isset($_POST['su_desc']) && isset($_POST['created_by'])
            ) {
                if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])) {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(!empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])){
                    $_SESSION['su_firstname'] = $DBInstance->escapeValues($_POST['su_firstname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && !empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])){
                    $_SESSION['su_middlename'] = $DBInstance->escapeValues($_POST['su_middlename']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && !empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])){
                    $_SESSION['su_lastname'] = $DBInstance->escapeValues($_POST['su_lastname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && !empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])){
                    $_SESSION['su_email'] = $DBInstance->escapeValues($_POST['su_email']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && !empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])){
                    $_SESSION['su_phonenumber'] = $DBInstance->escapeValues($_POST['su_phonenumber']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username'])  && empty($_POST['su_desc'])){
                    $_SESSION['su_password'] = $DBInstance->escapeValues($_POST['su_password']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && empty($_POST['su_desc'])){
                    $_SESSION['su_confirm_password'] = $DBInstance->escapeValues($_POST['su_confirm_password']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['su_firstname']) && empty($_POST['su_middlename']) && empty($_POST['su_lastname']) && empty($_POST['su_email']) && empty($_POST['su_phonenumber']) 
                    && empty($_POST['su_username']) && !empty($_POST['su_desc'])){
                    $_SESSION['su_desc'] = $DBInstance->escapeValues($_POST['su_desc']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(!empty($_POST['su_firstname']) && !empty($_POST['su_middlename']) && !empty($_POST['su_lastname']) && !empty($_POST['su_email']) && !empty($_POST['su_phonenumber']) 
                    && !empty($_POST['su_username'])  && !empty($_POST['su_desc'])){

                    echo $_SESSION['su_firstname'] = $DBInstance->escapeValues($_POST['su_firstname']);
                    echo $_SESSION['su_middlename'] = $DBInstance->escapeValues($_POST['su_middlename']);
                    echo $_SESSION['su_lastname'] = $DBInstance->escapeValues($_POST['su_lastname']);
                    echo $_SESSION['su_email'] = $DBInstance->escapeValues($_POST['su_email']);
                    echo $_SESSION['su_phonenumber'] = $DBInstance->escapeValues($_POST['su_phonenumber']);
                    echo $_SESSION['su_username'] = $DBInstance->escapeValues($_POST['su_username']);
                    echo $_SESSION['su_desc'] = $DBInstance->escapeValues($_POST['su_desc']);
                    echo $_SESSION['su_password'] = CainamCrypt::hashing($DBInstance->escapeValues($_POST['su_password']));
                    echo $_SESSION['su_gender_id'] = $DBInstance->escapeValues($_POST['su_gender_id']);
                    echo $_SESSION['su_dept_id'] = $DBInstance->escapeValues($_POST['su_dept_id']);
                    echo $_SESSION['su_role_id'] = $DBInstance->escapeValues($_POST['su_role_id']);
                    echo $_SESSION['su_status'] = 'unverified';
                    echo $_SESSION['su_token'] = md5(str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890"));
                    echo $_SESSION['su_prof_img'] = 'profile.png';
                    echo $_SESSION['su_createdby'] = $DBInstance->escapeValues($_POST['created_by']);
                    echo $_SESSION['su_timestamp'] = time();

                    if(strlen($_POST['su_password']) >= 8 && strlen($_POST['su_confirm_password']) >= 8) {
                        if($_POST['su_password'] != $_POST['su_confirm_password']) {
                            $session->message("Password Mismatch");
                            redirect_to("../sysuser/index.php?pg=1");
                        }else {
                            if(($_POST['su_dept_id'] == 'Choose...') && ($_POST['su_gender_id'] == 'Choose...')) {
                                $session->message("Please select Department and Gender");
                                redirect_to("../sysuser/index.php?pg=1");
                            }else if(($_POST['su_dept_id'] != 'Choose...') && ($_POST['su_gender_id'] == 'Choose...')) {
                                $session->message("Please select Gender");
                                redirect_to("../sysuser/index.php?pg=1");
                            }else if(($_POST['su_dept_id'] == 'Choose...') && ($_POST['su_gender_id'] != 'Choose...')) {
                                $session->message("Please select Department");
                                redirect_to("../sysuser/index.php?pg=1");
                            }else if(($_POST['su_dept_id'] != 'Choose...') && ($_POST['su_gender_id'] != 'Choose...')) {
                                $systemuser = new SystemUser();
                                if(!isset($_POST['systemuser_id'])) {
                                    if(empty($_POST['systemuser_id'])) {
                                        if($systemuser->isDataAssociatedWithExistInDB('email', $DBInstance->escapeValues($_POST['su_email']))) {
                                            $session->message("User with email ".$DBInstance->escapeValues($_POST['su_email'])." already exist.");
                                            $systemuser->unsetInstanceVars();
                                            redirect_to("../sysuser/index.php?pg=1");
                                        }else {
                                            $_SESSION['systemuserID'] = "";
                                            if($systemuser->addSystemUserInfoToInstanceVar($_SESSION['systemuserID'], $_SESSION['su_firstname'], $_SESSION['su_middlename'], $_SESSION['su_lastname'], $_SESSION['su_email'], $_SESSION['su_phonenumber'], $_SESSION['su_gender_id'],  $_SESSION['su_username'],  $_SESSION['su_password'], $_SESSION['su_dept_id'], $_SESSION['su_role_id'], $_SESSION['su_status'], $_SESSION['su_token'], $_SESSION['su_desc'], $_SESSION['su_prof_img'], $_SESSION['su_createdby'], $_SESSION['su_timestamp'])) {
                                                if($systemuser->addSystemUserInfoToDB()) {
                                                    $subject = "PMIS Account Verification.";
                                                    $body = $systemuser->systemUserRegistrationVerificationEmail();
                                                    if ($systemuser->sendEmail($subject, $body)){
                                                        $_SESSION['systemuser-email'] = $_SESSION['su_email'];
                                                        $_SESSION['systemuser-fullname'] = $systemuser->fullName($_SESSION['su_firstname'], $_SESSION['su_middlename'], $_SESSION['su_lastname']);
                                                        $_SESSION['systemuser-successmsg'] = "Registration Successfully. Verification email has been sent to ".$_SESSION['systemuser-email'].". Please open your email to verify your PMIS Account.";
                                                        if($systemuser->unsetInstanceAndSessionVars()) {
                                                            redirect_to("../sysuser/index.php?pg=1");
                                                        }
                                                    }
                                                }else {
                                                    redirect_to("../sysuser/index.php?pg=1");
                                                }
                                                print_r($systemuser->addSystemUserInfoToDB());
                                            }
                                        }
                                    }
                                }else if(isset($_POST['systemuser_id'])){
                                    if(empty($_POST['systemuser_id'])) {
                                        $_SESSION['systemuserID'] = $DBInstance->escapeValues($_POST['systemuser_id']);
                                        if($systemuser->addSystemUserInfoToInstanceVar($_SESSION['systemuserID'], $_SESSION['su_firstname'], $_SESSION['su_middlename'], $_SESSION['su_lastname'], $_SESSION['su_email'], $_SESSION['su_phonenumber'], $_SESSION['su_gender_id'],  $_SESSION['su_username'],  $_SESSION['su_password'], $_SESSION['su_dept_id'], $_SESSION['su_role_id'], $_SESSION['su_status'], $_SESSION['su_token'], $_SESSION['su_desc'], $_SESSION['su_prof_img'], $_SESSION['created_by'], $_SESSION['su_timestamp'])) {
                                            if($systemuser->addSystemUserInfoToDB()) {
                                                redirect_to("../sysuser/index.php?pg=1");
                                            }else {
                                                redirect_to("../sysuser/index.php?pg=1");
                                            }
                                        }
                                    }
                                }
                            }else {
                                redirect_to("../sysuser/index.php?pg=1");
                            }
                        }
                    }else {
                        $session->message("Password length must be atleast 8 characters");
                        redirect_to("../sysuser/index.php?pg=1");
                    }
                }else {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }
            }else {
                $session->message("Please fill all the fields before submitting");
                redirect_to("../sysuser/index.php?pg=1");
            }
        }else if(isset($_POST['update_system_user'])){
            if(isset($_POST['collapse_su_dept_id']) && isset($_POST['collapse_su_firstname']) && isset($_POST['collapse_su_middlename']) && isset($_POST['collapse_su_lastname']) && isset($_POST['collapse_su_gender_id']) &&
            isset($_POST['collapse_su_email']) && isset($_POST['collapse_su_phonenumber']) && isset($_POST['collapse_su_username']) && isset($_POST['collapse_su_password']) &&
            isset($_POST['collapse_su_token']) && isset($_POST['collapse_su_prof_img']) && isset($_POST['collapse_su_status']) && isset($_POST['collapse_su_role_id']) && isset($_POST['collapse_su_desc']) && isset($_POST['collapse_createdby'])  && isset($_POST['collapse_su_timestamp'])
            ) {
                if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])) {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(!empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_firstname'] = $DBInstance->escapeValues($_POST['collapse_su_firstname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && !empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_middlename'] = $DBInstance->escapeValues($_POST['collapse_su_middlename']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && !empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_lastname'] = $DBInstance->escapeValues($_POST['collapse_su_lastname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && !empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_email'] = $DBInstance->escapeValues($_POST['collapse_su_email']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && !empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_phonenumber'] = $DBInstance->escapeValues($_POST['collapse_su_phonenumber']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username'])  && empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_password'] = $DBInstance->escapeValues($_POST['collapse_su_password']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && empty($_POST['collapse_su_desc'])){
                    $_SESSION['su_confirm_password'] = $DBInstance->escapeValues($_POST['su_confirm_password']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(empty($_POST['collapse_su_firstname']) && empty($_POST['collapse_su_middlename']) && empty($_POST['collapse_su_lastname']) && empty($_POST['collapse_su_email']) && empty($_POST['collapse_su_phonenumber']) 
                    && empty($_POST['collapse_su_username']) && !empty($_POST['collapse_su_desc'])){
                    $_SESSION['collapse_su_desc'] = $DBInstance->escapeValues($_POST['collapse_su_desc']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }else if(!empty($_POST['collapse_su_firstname']) && !empty($_POST['collapse_su_middlename']) && !empty($_POST['collapse_su_lastname']) && !empty($_POST['collapse_su_email']) && !empty($_POST['collapse_su_phonenumber']) 
                    && !empty($_POST['collapse_su_username'])  && !empty($_POST['collapse_su_desc'])){

                    $_SESSION['collapse_su_firstname'] = $DBInstance->escapeValues($_POST['collapse_su_firstname']);
                    $_SESSION['collapse_su_middlename'] = $DBInstance->escapeValues($_POST['collapse_su_middlename']);
                    $_SESSION['collapse_su_lastname'] = $DBInstance->escapeValues($_POST['collapse_su_lastname']);
                    $_SESSION['collapse_su_email'] = $DBInstance->escapeValues($_POST['collapse_su_email']);
                    $_SESSION['collapse_su_phonenumber'] = $DBInstance->escapeValues($_POST['collapse_su_phonenumber']);
                    $_SESSION['collapse_su_username'] = $DBInstance->escapeValues($_POST['collapse_su_username']);
                    $_SESSION['collapse_su_desc'] = $DBInstance->escapeValues($_POST['collapse_su_desc']);
                    $_SESSION['collapse_su_password'] = $DBInstance->escapeValues($_POST['collapse_su_password']);
                    $_SESSION['collapse_su_gender_id'] = $DBInstance->escapeValues($_POST['collapse_su_gender_id']);
                    $_SESSION['collapse_su_dept_id'] = $DBInstance->escapeValues($_POST['collapse_su_dept_id']);
                    $_SESSION['collapse_su_role_id'] = $DBInstance->escapeValues($_POST['collapse_su_role_id']);
                    $_SESSION['collapse_su_status'] = 'unverified';
                    $_SESSION['collapse_su_token'] = md5(str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890"));
                    $_SESSION['collapse_su_prof_img'] = 'profile.png';
                    $_SESSION['collapse_su_createdby'] = $DBInstance->escapeValues($_POST['collapse_createdby']);
                    $_SESSION['collapse_su_timestamp'] = $DBInstance->escapeValues($_POST['collapse_su_timestamp']);

                    if(($_POST['collapse_su_dept_id'] == 'Choose...') && ($_POST['collapse_su_gender_id'] == 'Choose...')) {
                        $session->message("Please select Department and Gender");
                        redirect_to("../sysuser/index.php?pg=1");
                    }else if(($_POST['collapse_su_dept_id'] != 'Choose...') && ($_POST['collapse_su_gender_id'] == 'Choose...')) {
                        $session->message("Please select Gender");
                        redirect_to("../sysuser/index.php?pg=1");
                    }else if(($_POST['collapse_su_dept_id'] == 'Choose...') && ($_POST['collapse_su_gender_id'] != 'Choose...')) {
                        $session->message("Please select Department");
                        redirect_to("../sysuser/index.php?pg=1");
                    }else if(($_POST['collapse_su_dept_id'] != 'Choose...') && ($_POST['collapse_su_gender_id'] != 'Choose...')) {
                        $systemuser = new SystemUser();
                        if(isset($_POST['systemuser_id'])) {
                            if(!empty($_POST['systemuser_id'])) {
                                $_SESSION['systemuserID'] = $DBInstance->escapeValues($_POST['systemuser_id']);
                                if($systemuser->addSystemUserInfoToInstanceVar($_SESSION['systemuserID'], $_SESSION['collapse_su_firstname'], $_SESSION['collapse_su_middlename'], $_SESSION['collapse_su_lastname'], $_SESSION['collapse_su_email'], $_SESSION['collapse_su_phonenumber'], $_SESSION['collapse_su_gender_id'],  $_SESSION['collapse_su_username'],  $_SESSION['collapse_su_password'], $_SESSION['collapse_su_dept_id'], $_SESSION['collapse_su_role_id'], $_SESSION['collapse_su_status'], $_SESSION['collapse_su_token'], $_SESSION['collapse_su_desc'], $_SESSION['collapse_su_prof_img'], $_SESSION['collapse_su_createdby'], $_SESSION['collapse_su_timestamp'])) {
                                    if($systemuser->addSystemUserInfoToDB()) {
                                        redirect_to("../sysuser/index.php?pg=1");
                                    }else {
                                        redirect_to("../sysuser/index.php?pg=1");
                                    }
                                }else {
                                    $session->message("Failed to Update System User Data.");
                                    echo $_SESSION['collapse_su_firstname']."<br>";
                                    echo $_SESSION['collapse_su_middlename']."<br>";
                                    echo $_SESSION['collapse_su_lastname']."<br>";
                                    echo $_SESSION['collapse_su_email']."<br>";
                                    echo $_SESSION['collapse_su_phonenumber']."<br>";
                                    echo $_SESSION['collapse_su_username']."<br>";
                                    echo $_SESSION['collapse_su_desc']."<br>";
                                    echo $_SESSION['collapse_su_password']."<br>";
                                    echo $_SESSION['collapse_su_gender_id']."<br>";
                                    echo $_SESSION['collapse_su_dept_id']."<br>";
                                    echo $_SESSION['collapse_su_role_id']."<br>";
                                    echo $_SESSION['collapse_su_status']."<br>";
                                    echo $_SESSION['collapse_su_token']."<br>";
                                    echo $_SESSION['collapse_su_prof_img']."<br>";
                                    echo $_SESSION['collapse_su_createdby']."<br>";
                                    echo $_SESSION['collapse_su_timestamp']."<br>";
                                    // redirect_to("../sysuser/index.php?pg=1");

                                }
                            }
                        }else {
                            $session->message("ID is not set");
                            redirect_to("../sysuser/index.php?pg=1");
                        }
                    }else {
                        redirect_to("../sysuser/index.php?pg=1");
                    }
                }else {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../sysuser/index.php?pg=1");
                }
            }else {
                $session->message("Please fill all the fields before submitting");
                redirect_to("../sysuser/index.php?pg=1");
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $systemuser = SystemUser::getByID($_GET['id']);
            if($systemuser) {
                $systemuser->deleteSystemUser();
            }else {
                $session->message("User could not could not be deleted.");
                redirect_to("./index.php?pg=1");
            }
        }else {
                redirect_to("./index.php?pg=1");
        }
    }
?>