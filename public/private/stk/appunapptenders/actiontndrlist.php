<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['update_unapproved_stakeholder'])) {
            if(isset($_POST['unapproved_stakeholder_status']) && isset($_POST['collapse_unapproved_stakeholder_id'])) {
                if(!empty($_POST['unapproved_stakeholder_status']) && !empty($_POST['collapse_unapproved_stakeholder_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['unapproved_stakeholder_status'])) {
                        $session->message("Stakeholder account status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../tendererlist/index.php?pg=1");
                    }else {
                        $stakeholder_status_id = $DBInstance->escapeValues($_POST['collapse_unapproved_stakeholder_id']);
                        $stakeholder_status = $DBInstance->escapeValues($_POST['unapproved_stakeholder_status']);
                        $stakeholder_colname = 'status';
                        
                        if(Stakeholder::updateDataToDatabase($stakeholder_status_id, $stakeholder_colname, $stakeholder_status)) {
                            $session->message("User account status has been successfully updated.");
                            redirect_to("../tendererlist/index.php?pg=1");
                        }else {
                            $session->message("User account status failed to be updated updated.");
                            redirect_to("../tendererlist/index.php?pg=1");
                        }
                    }
                }
            }
        }else if(isset($_POST['update_approved_stakeholder'])) {
            if(isset($_POST['collapse_approved_stakeholder_status']) && isset($_POST['collapse_approved_stakeholder_id'])) {
                if(!empty($_POST['collapse_approved_stakeholder_status']) && !empty($_POST['collapse_approved_stakeholder_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['collapse_approved_stakeholder_status'])) {
                        $session->message("Stakeholder account status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../tendererlist/index.php?pg=1");
                    }else {
                        $stakeholder_status_id = $DBInstance->escapeValues($_POST['collapse_approved_stakeholder_id']);
                        $stakeholder_status = $DBInstance->escapeValues($_POST['collapse_approved_stakeholder_status']);
                        $stakeholder_colname = 'status';
                        
                        if(Stakeholder::updateDataToDatabase($stakeholder_status_id, $stakeholder_colname, $stakeholder_status)) {
                            $session->message("User account status has been successfully updated.");
                            redirect_to("../tendererlist/index.php?pg=1");
                        }else {
                            $session->message("User account status failed to be updated updated.");
                            redirect_to("../tendererlist/index.php?pg=1");
                        }
                    }
                }
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $publicStory = Story::getByID($_GET['id']);
            if($publicStory) {
                if ($publicStory->deletePublicStory()) {
                    redirect_to("../tendererlist/index.php?pg=1");
                }
            }else {
                redirect_to("../tendererlist/index.php?pg=1");
            }
        }else {
            redirect_to("../tendererlist/index.php?pg=1");
        }
    }
?>