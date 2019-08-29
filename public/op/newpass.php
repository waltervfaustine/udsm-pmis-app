<?php require_once("../../imports/autoload.php"); ?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['email']) && isset($_GET['token'])) {
            if(!empty($_GET['email']) && !empty($_GET['token'])) {
                global $DBInstance;
                $email = $DBInstance->escapeValues($_GET['email']);
                $token = $DBInstance->escapeValues($_GET['token']);
                $_SESSION['email'] = $email;
                $_SESSION['token'] = $token;

                $sql = "SELECT * FROM Stakeholders WHERE email = '$email' AND token = '$token'";
                $res_array = Stakeholder::getBySQL($sql);
                $foundUser = array_shift($res_array);
                if(!empty($foundUser)) {
                    redirect_to('../changepass.php');
                }else {
                    $session->message("Error in recovering password");
                    redirect_to('../changepass.php');
                }
            }else {
                $session->message("Error in recovering password");
                redirect_to('../changepass.php');
            }
        }else {
            $session->message("Error in recovering password");
            redirect_to('../changepass.php');
        }
    }
?>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
