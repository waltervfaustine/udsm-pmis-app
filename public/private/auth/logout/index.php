<?php require_once("../../../../imports/autoload.php"); ?>

<?php 
    global $session;
    if($session->logoutUser()) {
        unset($_SESSION['system_user_uid']);
		unset($_SESSION['system_user_role']);
        redirect_to("../../auth"); 
    }
?>