<?php require_once("../../imports/autoload.php"); ?>
<?php
    if(isset($_GET['username']) && isset($_GET['token'])) {
        if(!empty($_GET['username']) && !empty($_GET['token'])) {
            global $DBInstance;
            $username = $DBInstance->escapeValues($_GET['username']);
            $token = $DBInstance->escapeValues($_GET['token']);

            $sql = "SELECT * FROM stakeholders WHERE username = '$username' AND token = '$token'";
            $res_array = Stakeholder::getBySQL($sql);
            $foundUser = array_shift($res_array);
            // echo "<pre>";
            // print_r($foundUser->email);
            if(!empty($foundUser)) {
                if($foundUser->verification == 'unverified') {
                    global $DBInstance;
                    $sql = "UPDATE stakeholders SET verification = 'verified' WHERE username = '$username' AND token='$token'";
                    $result = $DBInstance->querying($sql);
                    if(!empty($result)) {
                        $_SESSION['sth-id'] = $foundUser->id;
                        $_SESSION['stk-email'] = $foundUser->email;
                        $_SESSION['stk-fullname'] = $foundUser->fname." ".$foundUser->mname." ".$foundUser->lname;
                        $_SESSION['stk-passcode'] = $foundUser->passcode;
                        unset( $_SESSION['stk-message']);
                        $_SESSION['stk-message'] = "Welcome <strong>".$_SESSION['stk-fullname']."</strong> your PMIS Account associated with email address <strong>".$_SESSION['stk-email']."</strong> is successfully verified.";
                        // $_SESSION['stk-role'] = $foundUser->role_id;
                        // $_SESSION['stk-email-status'] = 'verified';
                        
                        redirect_to('../versuccess.php');
                    }else {
                        $session->message("Verification process failed!");
                        redirect_to('../versuccess.php');
                    }
                }else if($foundUser->verification == 'verified'){
                    $_SESSION['sth-id'] = $foundUser->id;
                    $_SESSION['stk-email'] = $foundUser->email;
                    $_SESSION['stk-fullname'] = $foundUser->fname." ".$foundUser->mname." ".$foundUser->lname;
                    $_SESSION['stk-passcode'] = $foundUser->passcode;
                    // $_SESSION['stk-role'] = $foundUser->role_id;
                    unset( $_SESSION['stk-message']);
                    $_SESSION['stk-message'] = "Welcome <strong>".$_SESSION['stk-fullname']."</strong> your PMIS Account associated with email address <strong>".$_SESSION['stk-email']."</strong> is already verified.";
                    // $_SESSION['stk-email-status'] = 'verified';
                    // $session->message("Verification process successfully!");
                    redirect_to('../versuccess.php');
                }else{
                    unset( $_SESSION['stk-message']);
                    $_SESSION['stk-message'] = "PMIS account you are trying to verify maybe doesn't exist. Go and register new account or check if the URL sent to your email is correct and not modified.";
                    redirect_to('../verfailure.php');
                }
            }else {
                unset( $_SESSION['stk-message']);
                $_SESSION['stk-message'] = "Error in verifying your email. Check if the link you clicked is correct or not modified.";
                redirect_to('../verfailure.php');
            }
        }else {
            unset( $_SESSION['stk-message']);
            $_SESSION['stk-message'] = "Error in verifying your email. Check if the link you clicked is correct or not modified.";
            redirect_to('../verfailure.php');
        }
    }else {
        unset( $_SESSION['stk-message']);
        $_SESSION['stk-message'] = "Error in verifying your email. Check if the link you clicked is correct or not modified.";
        redirect_to('../verfailure.php');
    }

?>
<?php if(isset($database)) { $database->close_connection(); } ?>