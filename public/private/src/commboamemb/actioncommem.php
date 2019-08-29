<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_member'])) {
            if(isset($_POST['memb_fname']) && isset($_POST['memb_mname']) && isset($_POST['memb_lname']) && isset($_POST['memb_email']) && isset($_POST['memb_phone']) && isset($_POST['memb_passcode']) && isset($_POST['memb_confirm_passcode']) && isset($_POST['memb_role'])) {
                if(!empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $_SESSION['memb_fname'] = $DBInstance->escapeValues($_POST['memb_fname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && !empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $_SESSION['memb_mname'] = $DBInstance->escapeValues($_POST['memb_mname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && !empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $_SESSION['memb_lname'] = $DBInstance->escapeValues($_POST['memb_lname']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && !empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $_SESSION['memb_email'] = $DBInstance->escapeValues($_POST['memb_email']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                !empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $_SESSION['memb_phone'] = $DBInstance->escapeValues($_POST['memb_phone']);
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && !empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && !empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && !empty($_POST['memb_role'])) {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(empty($_POST['memb_fname']) && empty($_POST['memb_mname']) && empty($_POST['memb_lname']) && empty($_POST['memb_email']) && 
                empty($_POST['memb_phone']) && empty($_POST['memb_passcode']) && empty($_POST['memb_confirm_passcode']) && empty($_POST['memb_role'])) {
                    $session->message("Please fill all the fields before submitting");
                    redirect_to("../commboamemb/index.php?pg=1");
                }else if(!empty($_POST['memb_fname']) && !empty($_POST['memb_mname']) && !empty($_POST['memb_lname']) && !empty($_POST['memb_email']) && 
                !empty($_POST['memb_phone']) && !empty($_POST['memb_passcode']) && !empty($_POST['memb_confirm_passcode']) && !empty($_POST['memb_role'])) {
                    $_SESSION['memb_fname'] = $DBInstance->escapeValues($_POST['memb_fname']);
                    $_SESSION['memb_mname'] = $DBInstance->escapeValues($_POST['memb_mname']);
                    $_SESSION['memb_lname'] = $DBInstance->escapeValues($_POST['memb_lname']);
                    $_SESSION['memb_email'] = $DBInstance->escapeValues($_POST['memb_email']);
                    $_SESSION['memb_phone'] = $DBInstance->escapeValues($_POST['memb_phone']);
                    $_SESSION['memb_passcode'] = $DBInstance->escapeValues($_POST['memb_passcode']);
                    $_SESSION['memb_profile'] = 'profile.png';
                    $_SESSION['designation_id'] = -1;

                    if(strlen($_POST['memb_passcode']) >= 8 && strlen($_POST['memb_confirm_passcode']) >= 8) {
                        if($_POST['memb_passcode'] != $_POST['memb_confirm_passcode']) {
                            $session->message("Password Mismatch");
                            redirect_to("../commboamemb/index.php?pg=1");
                        }else {
                            $_SESSION['memb_passcode'] = $DBInstance->escapeValues($_POST['memb_passcode']);
                            if(($_POST['memb_role'] == 'Choose...') && ($_POST['memb_gender_id'] == 'Choose...')) {
                                $session->message("Please select Department and Gender");
                                redirect_to("../commboamemb/index.php?pg=1");
                            }else if(($_POST['memb_role'] != 'Choose...') && ($_POST['memb_gender_id'] == 'Choose...')) {
                                $session->message("Please select Gender");
                                redirect_to("../commboamemb/index.php?pg=1");
                            }else if(($_POST['memb_role'] == 'Choose...') && ($_POST['memb_gender_id'] != 'Choose...')) {
                                $session->message("Please select Department");
                                redirect_to("../commboamemb/index.php?pg=1");
                            }else if(($_POST['memb_role'] != 'Choose...') && ($_POST['memb_gender_id'] != 'Choose...')) {
                                $_SESSION['memb_role'] = $DBInstance->escapeValues($_POST['memb_role']);
                                $_SESSION['memb_gender_id'] = $DBInstance->escapeValues($_POST['memb_gender_id']);
                                $committeeboard = new CommitteeBoardMembers();

                                if(!isset($_POST['member_id'])) {
                                    if($committeeboard->isDataAssociatedWithExistInDB('email', $DBInstance->escapeValues($_POST['memb_email']))) {
                                        $session->message("User with email ".$DBInstance->escapeValues($_POST['memb_email'])." already exist.");
                                        if($committeeboard->unsetInstanceVars()) {
                                            redirect_to("../commboamemb/index.php?pg=1");
                                        }
                                    }else {
                                        $memberid = "";
                                        $time = time();
                                        if($committeeboard->addCommitteeBoardInstanceVar($memberid, $_SESSION['memb_fname'], $_SESSION['memb_mname'], $_SESSION['memb_lname'], $_SESSION['memb_email'], $_SESSION['memb_phone'], $_SESSION['memb_gender_id'], $_SESSION['memb_passcode'],  $_SESSION['memb_role'], $_SESSION['memb_profile'], $_SESSION['designation_id'], $time , $_SESSION['currentUID'])) {
                                            if($committeeboard->addCommitteeBoardMembersInfoToDB()) {
                                                if($committeeboard->unsetInstanceAndSessionVars()) {
                                                    redirect_to("../commboamemb/index.php?pg=1");
                                                }else {
                                                    $session->message("Failed To submit data");
                                                    redirect_to("../commboamemb/index.php?pg=1");
                                                }
                                            }else {
                                                $session->message("Failed To sebmit data");
                                                redirect_to("../commboamemb/index.php?pg=1");
                                            }
                                        }else {
                                            $session->message("Data processing failed");
                                            redirect_to("../commboamemb/index.php?pg=1");
                                        }
                                    }
                                }else if(isset($_POST['member_id'])){
                                    if(empty($_POST['member_id'])) {
                                        unset($_SESSION['memberID']);
                                        $_SESSION['memberID'] = "";
                                        if($committeeboard->addCommitteeBoardInstanceVar($memberid, $_SESSION['memb_fname'], $_SESSION['memb_mname'], $_SESSION['memb_lname'], $_SESSION['memb_email'], $_SESSION['memb_phone'], $_SESSION['memb_gender_id'], $_SESSION['memb_passcode'],  $_SESSION['memb_role'], $_SESSION['memb_profile'], $_SESSION['designation_id'], $time , $_SESSION['currentUID'])) {
                                            if($committeeboard->addCommitteeBoardMembersInfoToDB()) {
                                                redirect_to("../commboamemb/index.php?pg=1");
                                            }else {
                                                $session->message("Failed To sebmit data");
                                                redirect_to("../commboamemb/index.php?pg=1");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        $session->message("Password length must be atleast 8 characters");
                        redirect_to("../commboamemb/index.php?pg=1");
                    }
                }else {
                    $session->message("Please fill all the fields");
                    redirect_to("../commboamemb/index.php?pg=1");
                }
            }else {
                $session->message("Please fill all the fields");
                redirect_to("../commboamemb/index.php?pg=1");
            }
        }else if(isset($_POST['assign_board_member'])) {
            if(isset($_POST['collapse_board_id']) && isset($_POST['collapse_board_member_id'])) {
                if(!empty($_POST['collapse_board_id']) && !empty($_POST['collapse_board_member_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['collapse_board_id'])) {
                        $session->message("Board Membership cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../commboamemb/boardmem.php?pg=1");
                    }else {
                        $collapse_board_member_id = $DBInstance->escapeValues($_POST['collapse_board_member_id']);
                        $collapse_board_id = $DBInstance->escapeValues($_POST['collapse_board_id']);
                        $stakeholder_colname = 'designated_id';
                        
                        if(CommitteeBoardMembers::updateDataToDatabase($collapse_board_member_id, $stakeholder_colname, $collapse_board_id)) {
                            $session->message("Membership is successfully assigned");
                            redirect_to("../commboamemb/boardmem.php?pg=1");
                        }else {
                            $session->message("Membership failed to be assigned");
                            redirect_to("../commboamemb/boardmem.php?pg=1");
                        }
                    }
                }
            }
        }else if(isset($_POST['assign_committee_member'])) {
            if(isset($_POST['collapse_committee_id']) && isset($_POST['collapse_committee_member_id'])) {
                if(!empty($_POST['collapse_committee_id']) && !empty($_POST['collapse_committee_member_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['collapse_committee_id'])) {
                        $session->message("Committee Membership cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../commboamemb/commem.php?pg=1");
                    }else {
                        $collapse_committee_member_id = $DBInstance->escapeValues($_POST['collapse_committee_member_id']);
                        $collapse_committee_id = $DBInstance->escapeValues($_POST['collapse_committee_id']);
                        $stakeholder_colname = 'designated_id';
                        
                        if(CommitteeBoardMembers::updateDataToDatabase($collapse_committee_member_id, $stakeholder_colname, $collapse_committee_id)) {
                            $session->message("Membership is successfully assigned");
                            redirect_to("../commboamemb/commem.php?pg=1");
                        }else {
                            $session->message("Membership failed to be assigned");
                            redirect_to("../commboamemb/commem.php?pg=1");
                        }
                    }
                }
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $committeeboard = CommitteeBoardMembers::getByID($_GET['id']);
            if($committeeboard) {
                $committeeboard->deleteMembers();
            }else {
                $session->message("Member could not could not be deleted.");
                redirect_to("../commboamemb/index.php?pg=1");
            }
        }else {
            redirect_to("../commboamemb/index.php?pg=1");
        }
    }

?>