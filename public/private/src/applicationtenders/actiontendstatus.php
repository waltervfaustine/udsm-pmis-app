

<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['assign_tender_winner'])) {
            if(isset($_POST['collapse_assigning_winning']) && isset($_POST['collapse_tender_applicationid'])) {
                if(!empty($_POST['collapse_assigning_winning']) && !empty($_POST['collapse_tender_applicationid'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['collapse_assigning_winning'])) {
                        $session->message("Error is in assigning Wiining to the Tenderer");
                            redirect_to("../../applicationtenders/apptend.php?pg=1");
                    }else {
                        $collapse_tender_applicationid = $DBInstance->escapeValues($_POST['collapse_tender_applicationid']);
                        $collapse_assigning_winning = $DBInstance->escapeValues($_POST['collapse_assigning_winning']);
                        $tender_application_colname = 'status';
                        
                        if(TenderApplication::updateDataToDatabase($collapse_tender_applicationid, $tender_application_colname, $collapse_assigning_winning)) {
                            $session->message("Winning Status is successfully added to the Tender");
                            redirect_to("../../applicationtenders/apptend.php?pg=1");
                        }else {
                            $session->message("Failed to assign Winning Status to Tenderer Application");
                            redirect_to("../../applicationtenders/apptend.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failed to assign Winning Status to Tenderer Application");
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }
            }else {
                $session->message("Failed to assign Winning Status to Tenderer Application");
                redirect_to("../../applicationtenders/apptend.php?pg=1");
            }
        }else if(isset($_POST['submit_awarding_letter'])) {
            if(isset($_POST['collapse_tender_applicationid']) && isset($_FILES['awarding_letter_document'])) {
                if(!empty($_POST['collapse_tender_applicationid']) && empty($_FILES['awarding_letter_document']['name'])) {
                    $session->message("Please select awarding letter to upload");
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }else if(!empty($_POST['collapse_tender_applicationid']) && !empty($_FILES['awarding_letter_document']['name'])){
                    $tender_id = $DBInstance->escapeValues($_POST['collapse_tender_applicationid']);
                    $awardingletter = $_FILES['awarding_letter_document'];
                    $docfilename = basename($awardingletter['name']);
                    $temp_docfile = $awardingletter['tmp_name'];
                    
                    $upload_directory = "awarding_letter";
                    $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$upload_directory.DS.$docfilename;

                    if(TenderApplication::checkIfFileExistPMUOfficer($temp_docfile, $target_path, $docfilename)) {
                        redirect_to("../../applicationtenders/apptend.php?pg=1");
                    }
                }else {
                    $session->message("Failed To Send Awarding Letter To Tenderer");
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }
            }else {
                $session->message("Failed To Send Awarding Letter To Tenderer");
                redirect_to("../../applicationtenders/apptend.php?pg=1");
            }
        }else if(isset($_POST['remove_awarding_letter'])) {
            if(isset($_POST['collapse_tender_applicationid'])) {
                if(!empty($_POST['collapse_tender_applicationid'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['collapse_tender_applicationid'])) {
                        $session->message("Error is in removing award to Tenderer");
                            redirect_to("../../applicationtenders/apptend.php?pg=1");
                    }else {
                        $collapse_tender_applicationid = $DBInstance->escapeValues($_POST['collapse_tender_applicationid']);
                        $collapse_assigning_winning = $DBInstance->escapeValues("false");
                        $tender_application_colname = 'award';
                        
                        if(TenderApplication::updateDataToDatabase($collapse_tender_applicationid, $tender_application_colname, $collapse_assigning_winning)) {
                            $session->message("Award is successfully removed from Tender");
                            redirect_to("../../applicationtenders/apptend.php?pg=1");
                        }else {
                            $session->message("The Currently The Tenderer is not Awarded any Winning Award");
                            redirect_to("../../applicationtenders/apptend.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failed to assign Award to Tenderer Application");
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }
            }else {
                $session->message("Failed to assign Award to Tenderer Application");
                redirect_to("../../applicationtenders/apptend.php?pg=1");
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $tenderApplication = TenderApplication::getByID($_GET['id']);
            if($tenderApplication) {
                if ($tenderApplication->deleteTenderBoard()) {
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }
            }else {
                $session->message("The Tender Board could not be deleted.");
                redirect_to("../../applicationtenders/apptend.php?pg=1");
            }
        }else {
            $session->message("Error while deleting Tender Board");
            redirect_to("../../applicationtenders/apptend.php?pg=1");
        }
    }
?>

