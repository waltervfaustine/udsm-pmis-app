<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['update_unapproved_status'])) {
            if(isset($_POST['unapproved_tender_status']) && isset($_POST['unapproved_tender_id'])) {
                if(!empty($_POST['unapproved_tender_status']) && !empty($_POST['unapproved_tender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['unapproved_tender_status'])) {
                        $session->message("Tender Status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../appunapptenders/index.php?pg=1");
                    }else {
                        $unapproved_tender_id = $DBInstance->escapeValues($_POST['unapproved_tender_id']);
                        $unapproved_tender_status = $DBInstance->escapeValues($_POST['unapproved_tender_status']);
                        $stakeholder_colname = 'status';
                        
                        if(TenderPosting::updateDataToDatabase($unapproved_tender_id, $stakeholder_colname, $unapproved_tender_status)) {
                            $session->message("Tender Status is successfully changed");
                            redirect_to("../appunapptenders/index.php?pg=1");
                        }else {
                            $session->message("Tender Status failed to be changed");
                            redirect_to("../appunapptenders/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failure to update status");
                    redirect_to("../appunapptenders/index.php?pg=1");
                }
            }else {
                $session->message("Failure to update status");
                redirect_to("../appunapptenders/index.php?pg=1");
            }
        }else if(isset($_POST['update_approved_status'])) {
            if(isset($_POST['approved_tender_status']) && isset($_POST['approved_tender_id'])) {
                if(!empty($_POST['approved_tender_status']) && !empty($_POST['approved_tender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['approved_tender_status'])) {
                        $session->message("Tender Status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../appunapptenders/index.php?pg=1");
                    }else {
                        $approved_tender_id = $DBInstance->escapeValues($_POST['approved_tender_id']);
                        $approved_tender_status = $DBInstance->escapeValues($_POST['approved_tender_status']);
                        $stakeholder_colname = 'status';
                        
                        if(TenderPosting::updateDataToDatabase($approved_tender_id, $stakeholder_colname, $approved_tender_status)) {
                            $session->message("Tender Status is successfully changed");
                            redirect_to("../appunapptenders/index.php?pg=1");
                        }else {
                            $session->message("Tender Status failed to be changed");
                            redirect_to("../appunapptenders/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failure to update status");
                    redirect_to("../appunapptenders/index.php?pg=1");
                }
            }else {
                $session->message("Failure to update status");
                redirect_to("../appunapptenders/index.php?pg=1");
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