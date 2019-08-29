<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['assign_committee_to_tender'])) {
            if(isset($_POST['collapse_commid']) && isset($_POST['collapse_commtender_id'])) {
                if(!empty($_POST['collapse_commid']) && !empty($_POST['collapse_commtender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['collapse_commid'])) {
                        $session->message("Error is in assigning Committee to the Tender");
                        redirect_to("../commboassign/accindex.php?pg=1");
                    }else {
                        $collapse_commtender_id = $DBInstance->escapeValues($_POST['collapse_commtender_id']);
                        $collapse_commid = $DBInstance->escapeValues($_POST['collapse_commid']);
                        $stakeholder_colname = 'committeeid';
                        
                        if(TenderPosting::updateDataToDatabase($collapse_commtender_id, $stakeholder_colname, $collapse_commid)) {
                            $session->message("Committee is successfully added to the Tender");
                            redirect_to("../commboassign/accindex.php?pg=1");
                        }else {
                            $session->message("Failed to assign Committee to Tender");
                            redirect_to("../commboassign/accindex.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failure to update status");
                    redirect_to("../commboassign/accindex.php?pg=1");
                }
            }else {
                $session->message("Failure to update status");
                redirect_to("../commboassign/accindex.php?pg=1");
            }
        }else if(isset($_POST['assign_board_to_tender'])) {
            if(isset($_POST['collapse_boaid']) && isset($_POST['collapse_boatender_id'])) {
                if(!empty($_POST['collapse_boaid']) && !empty($_POST['collapse_boatender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['collapse_boaid'])) {
                        $session->message("Error is in assigning Committee to the Tender");
                        redirect_to("../commboassign/accindex.php?pg=1");
                    }else {
                        $collapse_boatender_id = $DBInstance->escapeValues($_POST['collapse_boatender_id']);
                        $collapse_boaid = $DBInstance->escapeValues($_POST['collapse_boaid']);
                        $stakeholder_colname = 'boardid';
                        
                        if(TenderPosting::updateDataToDatabase($collapse_boatender_id, $stakeholder_colname, $collapse_boaid)) {
                            $session->message("Tender Board is successfully added to the Tender");
                            redirect_to("../commboassign/accindex.php?pg=1");
                        }else {
                            $session->message("Failed to assign Tender Board to Tender");
                            redirect_to("../commboassign/accindex.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failed to add Tender Board to Tender");
                    redirect_to("../commboassign/accindex.php?pg=1");
                }
            }else {
                $session->message("Failed to add Tender Board to Tender");
                redirect_to("../commboassign/accindex.php?pg=1");
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $publicStory = Story::getByID($_GET['id']);
            if($publicStory) {
                if ($publicStory->deletePublicStory()) {
                    redirect_to("../tendererlist/accindex.php?pg=1");
                }
            }else {
                redirect_to("../tendererlist/accindex.php?pg=1");
            }
        }else {
            redirect_to("../tendererlist/accindex.php?pg=1");
        }
    }
?>