<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['recpassword_btn'])) {
            if(isset($_POST['fogpass_email'])) {
                if(!empty($_POST['fogpass_email'])) {
                    global $DBInstance;
                    $email = $DBInstance->escapeValues($_POST['fogpass_email']);
                    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                    $res_array = User::getBySQL($sql);
                    $foundUser = array_shift($res_array);
                    $user = new User();

                    global $session;
                    if(!empty($foundUser)) {
                        $subject = "UDSM PMIS Account Password Recovery Email.";
                        $fname = $foundUser->fname;
                        $email = $foundUser->email;
                        $token = $foundUser->token;
                        $fullname = $foundUser->fname." ".$foundUser->mname."".$foundUser->lname;
                        $body = $user->userPasswordRecoveryMessage($fname, $email, $token);
                        if ($user->sendRecoveryEmail($email, $fullname, $subject, $body)){
                            $_SESSION['recover-email'] = $email;
                            $_SESSION['recover-message'] = "Password recovery link is successfully sent to user with email address $email.";
                            redirect_to("../passsuccess.php");
                        }else {
                            $_SESSION['recover-message'] = "Failed to send email recovery link to the email <strong>'$email'.</strongs>";
                            $session->message("Failed to send email recovery link to the email $email");
                            redirect_to("../fogpass.php");
                        }
                    }else {
                        $session->message("No PMIS Account associated with the following email $email");
                        redirect_to("../fogpass.php");
                    }
                }else {
                    $session->message("Please insert your email");
                    redirect_to("../fogpass.php");
                }
            }
        }
    }
?>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
