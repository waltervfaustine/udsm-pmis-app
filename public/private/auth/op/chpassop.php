<?php require_once("../../../../imports/autoload.php"); ?>
<?php
    global $DBInstance;
    global $session;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['changepass_btn'])) {
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
                        redirect_to('../changepass.php');
                    }

                    if($password == $confirm_password) {
                        $sql = "UPDATE users SET passcode = $password WHERE email = '$email' AND token='$token'";
                        if ($DBInstance->querying($sql)) {
                            unset($_SESSION['email']);
                            unset($_SESSION['token']);

                            $sql = "SELECT * FROM users WHERE email = '$email' AND token = '$token' LIMIT 1";

                            $res_array = User::getBySQL($sql);
                            $foundUser = array_shift($res_array);

                            if($foundUser->status == "verified") {
                                $_SESSION['user_id'] = $foundUser->id;
                                $_SESSION['role_id'] = $foundUser->role_id;

                                if(isset($_SESSION['user_id']) && $_SESSION['role_id']) {
                                    redirect_to('../../src/uhome/');
                                }else {
                                    redirect_to('../changepass.php');
                                }
                            }
                        }
                    }else {
                        $session->message("Password doesn't match.");
                        redirect_to('../changepass.php');
                    }
                }else {
                    $session->message("I dont know what to figure it out.");
                    redirect_to('../changepass.php');
                }   
            }
        }
    }
?>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
