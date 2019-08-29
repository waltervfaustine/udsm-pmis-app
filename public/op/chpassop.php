<?php require_once("../../imports/autoload.php"); ?>
<?php
    global $DBInstance;
    global $session;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['ch_password']) && isset($_POST['ch_confirm_password'])) {
            if(empty($_POST['ch_password']) && empty($_POST['ch_confirm_password'])) {
                $session->message("Please fill all the fields");
                redirect_to('../changepass.php');
            }else if(!empty($_POST['ch_password']) && empty($_POST['ch_confirm_password'])) {
                $session->message("Please fill all the fields");
                redirect_to('../changepass.php');
            }else if(empty($_POST['ch_password']) && !empty($_POST['ch_confirm_password'])) {
                $session->message("Please fill all the fields");
                redirect_to('../changepass.php');
            }else if(!empty($_POST['ch_password']) && !empty($_POST['ch_confirm_password'])) {
                $password = $DBInstance->escapeValues($_POST['ch_password']);
                $confirm_password = $DBInstance->escapeValues($_POST['ch_confirm_password']);

                if(isset($_SESSION['email']) && isset($_SESSION['token'])) {
                    $email = $DBInstance->escapeValues($_SESSION['email']);
                    $token = $DBInstance->escapeValues($_SESSION['token']);
                }else {
                    redirect_to('../pubtend.php');
                }

                if($password == $confirm_password) {
                    $hash_password = CainamCrypt::hashing($DBInstance->escapeValues($password));
                    $sql = "UPDATE Stakeholders SET passcode = $hash_password WHERE email = '$email' AND token='$token'";
                    if ($DBInstance->querying($sql)) {
                        unset($_SESSION['email']);
                        unset($_SESSION['token']);

                        $sql = "SELECT * FROM Stakeholders WHERE email = '$email' AND token = '$token' LIMIT 1";
                        $res_array = Stakeholder::getBySQL($sql);
                        $foundUser = array_shift($res_array);

                        if($foundUser->verification == "unverified") {
                            $session->message("Please verify your account.");
                            redirect_to('../pubtend.php');
                        }else if($foundUser->status == "unapproved") {
                            $session->message("Please your account is unapproved. Please contact PMIS Team.");
                            redirect_to('../pubtend.php');
                        }else if($foundUser->verification == "verified" && $foundUser->status == "approved") {
                            $_SESSION['stakeholder-uid'] = $foundUser->id;
                            $_SESSION['stakeholder-roleID'] = $foundUser->role_id;
                            echo $_SESSION['stakeholder-uid'];
                            echo $_SESSION['stakeholder-roleID'];
                            if(isset($_SESSION['stakeholder-uid']) && $_SESSION['stakeholder-roleID']) {
                                redirect_to('../../public/private/src/thome/');
                            }else {
                                redirect_to('../pubtend.php');
                            }
                        }
                    }
                }else {
                    $session->message("Password doesn't match.");
                    redirect_to('../changepass.php');
                }
            }else {
                redirect_to('../changepass.php');
            }   
        }
    }
?>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
