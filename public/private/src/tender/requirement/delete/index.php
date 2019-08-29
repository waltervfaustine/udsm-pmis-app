<?php require_once("../../../../../../imports/autoload.php"); ?>

<?php 
    if(empty($_GET['id'])) {
        $session->message("No User Requirement can be deleted!");
        redirect_to('../../');
    }
    $userRequirement = UserRequirement::getByID($_GET['id']);
    if($userRequirement) {
        $userRequirement->deleteUserRequirement();
        redirect_to('../../requirement');
    }else {
        $session->message("The User Requirement could not be deleted.");
        redirect_to('index.php');
    }

?>

<?php if(isset($database)) { $database->close_connection(); } ?>