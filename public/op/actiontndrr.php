<?php require_once("../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_tenderer_information'])) {
            if(isset($_POST['tbreg_category']) && isset($_POST['tbcreg_firstname']) && isset($_POST['tbcreg_middlename']) && isset($_POST['tbcreg_lastname']) 
            && isset($_POST['tbcreg_email']) && isset($_POST['tbcreg_phonecall']) && isset($_POST['tbcreg_gender']) && isset($_POST['tbcreg_username']) && isset($_POST['tbcreg_role_id'])
            && isset($_POST['tbcreg_passcode']) && isset($_POST['tbcreg_passcode_confirm']) && isset($_POST['tbcreg_idcard']) && isset($_POST['tbcreg_idcard_type']) && isset($_POST['tbcreg_verification']) 
            && isset($_POST['tbcreg_status']) && isset($_POST['tbcreg_token']) && isset($_POST['tbcreg_prof_img'])) {
                if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))){
                    $session->message("Please fill all fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((!empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_firstname'] = $DBInstance->escapeValues($_POST['tbcreg_firstname']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && !empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_middlename'] = $DBInstance->escapeValues($_POST['tbcreg_middlename']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && !empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_lastname'] = $DBInstance->escapeValues($_POST['tbcreg_lastname']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && !empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_email'] = $DBInstance->escapeValues($_POST['tbcreg_email']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && !empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_phonecall'] = $DBInstance->escapeValues($_POST['tbcreg_phonecall']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && !empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_username'] = $DBInstance->escapeValues($_POST['tbcreg_username']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && !empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && !empty($_POST['tbcreg_passcode_confirm']) && empty($_POST['tbcreg_idcard']))) {
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((empty($_POST['tbcreg_firstname']) && empty($_POST['tbcreg_middlename']) && empty($_POST['tbcreg_lastname'])
                && empty($_POST['tbcreg_email']) && empty($_POST['tbcreg_phonecall']) && empty($_POST['tbcreg_username'])
                && empty($_POST['tbcreg_passcode']) && empty($_POST['tbcreg_passcode_confirm']) && !empty($_POST['tbcreg_idcard']))) {
                    $_SESSION['tbcreg_idcard'] = $DBInstance->escapeValues($_POST['tbcreg_idcard']);
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }else if((!empty($_POST['tbcreg_firstname']) && !empty($_POST['tbcreg_middlename']) && !empty($_POST['tbcreg_lastname'])
                && !empty($_POST['tbcreg_email']) && !empty($_POST['tbcreg_phonecall']) && !empty($_POST['tbcreg_username'])  && !empty($_POST['tbcreg_role_id'])
                && !empty($_POST['tbcreg_passcode']) && !empty($_POST['tbcreg_passcode_confirm']) && !empty($_POST['tbcreg_idcard']))) {

                    if(strlen($_POST['tbcreg_passcode']) >= 8 && strlen($_POST['tbcreg_passcode_confirm']) >= 8) {
                        if($_POST['tbcreg_passcode'] != $_POST['tbcreg_passcode_confirm']) {
                            $session->message("Password Mismatch");
                            redirect_to("../tenderreg.php");
                        }else {
                            if(($_POST['tbreg_category'] == 'Choose...') && ($_POST['tbcreg_gender'] == 'Choose...') && ($_POST['tbcreg_idcard_type'] == 'Choose...')) {
                                $session->message("Please select Supply Category, Gender and ID Card Type");
                                redirect_to("../tenderreg.php");
                            }else if(($_POST['tbreg_category'] != 'Choose...') && ($_POST['tbcreg_gender'] == 'Choose...') && ($_POST['tbcreg_idcard_type'] == 'Choose...')) {
                                $session->message("Please select Gender and ID Card Type");
                                redirect_to("../tenderreg.php");
                            }else if(($_POST['tbreg_category'] == 'Choose...') && ($_POST['tbcreg_gender'] != 'Choose...') && ($_POST['tbcreg_idcard_type'] == 'Choose...')) {
                                $session->message("Please select Supply Category and ID Card Type");
                                redirect_to("../tenderreg.php");
                            }else if(($_POST['tbreg_category'] == 'Choose...') && ($_POST['tbcreg_gender'] == 'Choose...') && ($_POST['tbcreg_idcard_type'] != 'Choose...')) {
                                $session->message("Please select Supply Category and Gender");
                                redirect_to("../tenderreg.php");
                            }else {
                                
                                if(isset($_POST['tbcreg_agree'])) {
                                    $stakeholder = new Stakeholder();
                                    $stakeholder->fname = $DBInstance->escapeValues($_POST['tbcreg_firstname']);
                                    $stakeholder->mname = $DBInstance->escapeValues($_POST['tbcreg_middlename']);
                                    $stakeholder->lname = $DBInstance->escapeValues($_POST['tbcreg_lastname']);
                                    $stakeholder->email = $DBInstance->escapeValues($_POST['tbcreg_email']);
                                    $stakeholder->phone = $DBInstance->escapeValues($_POST['tbcreg_phonecall']);
                                    $stakeholder->gender = $DBInstance->escapeValues($_POST['tbcreg_gender']);
                                    $stakeholder->username = $DBInstance->escapeValues($_POST['tbcreg_username']);
                                    $stakeholder->passcode = CainamCrypt::hashing($DBInstance->escapeValues($_POST['tbcreg_passcode']));
                                    $stakeholder->idcard_no = $DBInstance->escapeValues($_POST['tbreg_category']);
                                    $stakeholder->id_typeid = $DBInstance->escapeValues($_POST['tbcreg_idcard']);
                                    $stakeholder->supply_id = $DBInstance->escapeValues($_POST['tbreg_category']);
                                    $stakeholder->status = $DBInstance->escapeValues('unapproved');
                                    $stakeholder->token = md5(str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890"));
                                    $stakeholder->prof_img = $DBInstance->escapeValues("profile.png");
                                    $stakeholder->verification = $DBInstance->escapeValues('unverified');
                                    $stakeholder->role_id = $DBInstance->escapeValues($_POST['tbcreg_role_id']);
                                    $stakeholder->timestamp = time();

                                    if (isset($_POST['stakeholder_id'])) {
                                        $stakeholder->id = $DBInstance->escapeValues($_POST['stakeholder_id']);
                                        $_SESSION['stakeholderID'] = $DBInstance->escapeValues($_POST['stakeholder_id']);
                                        if($stakeholder->addStakeholderInfoToDB()) {
                                            redirect_to("../tenderreg.php");
                                        }else {
                                            $session->message("Registration failed for user with email ".$DBInstance->escapeValues($_POST['tbcreg_email']).".");
                                            redirect_to("../tenderreg.php");
                                        }
                                    }else {
                                        if($stakeholder->isDataAssociatedWithExistInDB('email', $DBInstance->escapeValues($_POST['tbcreg_email']))) {
                                            $session->message("User with email ".$stakeholder->email." already exist.");
                                            redirect_to("../tenderreg.php");
                                        }else {
                                            $_SESSION['stakeholderID'] = "";
                                            if($stakeholder->addStakeholderInfoToDB()) {
                                                $subject = "PMIS Account Verification.";
                                                $body = $stakeholder->stakeholdersRegistrationVerificationEmail();
                                                if ($stakeholder->sendEmail($subject, $body)){
                                                    $_SESSION['stakeholder-email'] = $stakeholder->email;
                                                    $_SESSION['stakeholder-fullname'] = $stakeholder->fullName($stakeholder->fname, $stakeholder->mname, $stakeholder->lname);
                                                    $_SESSION['stakeholder-successmsg'] = "Registration Successfully. Verification email has been sent to ".$stakeholder->email.". Please open your email to verify your PMIS Account.";
                                                    if($stakeholder->unsetInstanceAndSessionVars()) {
                                                        redirect_to("../regsuccess.php");
                                                    }
                                                }
                                            }else {
                                                redirect_to("../tenderreg.php");
                                            }
                                        }
                                    }
                                }else {
                                    $session->message("Please agree that you have read the terms and conditions for the UDSM PMIS by clicking the checkbox");
                                    redirect_to("../tenderreg.php");
                                }
                            }
                        }
                    }else {
                        $session->message("Password Must be 8 Characters and above");
                        redirect_to("../tenderreg.php");
                    }
                }else {
                    $session->message("Please fill the other fields before submitting");
                    redirect_to("../tenderreg.php");
                }
            }
        }else {
            $session->message("Please fill the other fields before submitting");
            redirect_to("../tenderreg.php");
        }
    }
?>