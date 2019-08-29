<?php require_once("../../imports/autoload.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['recpassword_btn'])) {
            if(isset($_POST['fogpass_email'])) {
                if(!empty($_POST['fogpass_email'])) {
                    global $DBInstance;
                    $email = $DBInstance->escapeValues($_POST['fogpass_email']);
                    $sql = "SELECT * FROM Stakeholders WHERE email = '$email' LIMIT 1";
                    $res_array = Stakeholder::getBySQL($sql);
                    $foundUser = array_shift($res_array);
                    $stakeholder = new Stakeholder();
                    if(!empty($foundUser)) {
                        $subject = "UDSM PMIS Account Password Recovery Email.";
                        $fname = $foundUser->fname;
                        $email = $foundUser->email;
                        $token = $foundUser->token;
                        $fullname = $foundUser->fname." ".$foundUser->mname."".$foundUser->lname;
                        $body = $stakeholder->passwordRecoveryMessage($fname, $email, $token);
                        if ($stakeholder->sendRecoveryEmail($email, $fullname, $subject, $body)){
                            $_SESSION['recover-email'] = $email;
                            $_SESSION['recover-message'] = "Password recovery link is successfully sent to user with email address <strong>$email</strongs>.";
                            redirect_to("../passsuccess.php");
                        }else {
                            $_SESSION['recover-message'] = "Failed to send email recovery link to the email <strong>'$email'.</strongs>";
                            redirect_to("../passfailure.php");
                        }
                    }
                }else {
                    $session->message("Please type email address to recover password");
                    redirect_to("../fogpass.php");
                }
            }
        }
    }
?>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
