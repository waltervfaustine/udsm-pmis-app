<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_stage_name'])) {
            if(isset($_POST['tender_stage_name']) && isset($_POST['tender_stage_desc'])) {
                if(empty($_POST['tender_stage_name']) && empty($_POST['tender_stage_desc'])) {
                    $session->message("Please Insert Tender Title and Description before submitting!");
                    redirect_to("../tenderstage/index.php?pg=1");
                }else if(!empty($_POST['tender_stage_name']) && empty($_POST['tender_stage_desc'])) {
                    $_SESSION['tender_stage_name'] = $DBInstance->escapeValues($_POST['tender_stage_name']);
                    $session->message("Please Insert Tender Description before submitting!");
                    redirect_to("../tenderstage/index.php?pg=1");
                }else if(empty($_POST['tender_stage_name']) && !empty($_POST['tender_stage_desc'])) {
                    $_SESSION['tender_stage_desc'] = $DBInstance->escapeValues($_POST['tender_stage_desc']);
                    $session->message("Please Insert Tender Title before submitting!");
                    redirect_to("../tenderstage/index.php?pg=1");
                }else if(!empty($_POST['tender_stage_name']) && !empty($_POST['tender_stage_desc'])) {
                    if(preg_match('/[\'^£$%&*}{@#~?><>,|=_+¬-]/', $_POST['tender_stage_name']) || preg_match('/[0-9]/', $_POST['tender_stage_name'])) {
                        $session->message("Tender Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderstage/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*}{@#~?><>,|=_+¬-]/', $_POST['tender_stage_desc']) || preg_match('/[0-9]/', $_POST['tender_stage_desc'])) {
                        $session->message("Tender Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderstage/index.php?pg=1");
                    }else {
                        $title = $DBInstance->escapeValues($_POST['tender_stage_name']);
                        $desc = $DBInstance->escapeValues($_POST['tender_stage_desc']);
                        $tenderstage = new TenderStage();

                        if (isset($_POST['tenderstage_id'])) {
                            $tenderstageID = $DBInstance->escapeValues($_POST['tenderstage_id']);
                            $tenderstage->id = $tenderstageID;
                            $tenderstage->title = $DBInstance->escapeValues($_POST['tender_stage_name']);
                            $tenderstage->description = $DBInstance->escapeValues($_POST['tender_stage_desc']);
                            if($tenderstage->addTenderStageToDB()) {
                                redirect_to("../tenderstage/index.php?pg=1");
                            }else {
                                redirect_to("../tenderstage/index.php?pg=1");
                            }                                
                        }else {
                            if($tenderstage->isDataAssociatedWithExistInDB('title', $DBInstance->escapeValues($_POST['tender_stage_name']))) {
                                $session->message("Tender Stage".$DBInstance->escapeValues($_POST['tender_stage_name'])." already exist.");
                                redirect_to("../tenderstage/index.php?pg=1");
                            }else {
                                $tenderstage->title = $DBInstance->escapeValues($_POST['tender_stage_name']);
                                $tenderstage->description = $DBInstance->escapeValues($_POST['tender_stage_desc']);
                                if($tenderstage->addTenderStageToDB()) {
                                    redirect_to("../tenderstage/index.php?pg=1");
                                }else {
                                    redirect_to("../tenderstage/index.php?pg=1");
                                }
                            }
                        }
                    }
                }
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $tenderstage = TenderStage::getByID($_GET['id']);
            if($tenderstage) {
                if ($tenderstage->deletetenderstage()) {
                    redirect_to("../tenderstage/index.php?pg=1");
                }
            }else {
                $session->message("The Tender Stage could not be deleted.");
                redirect_to("../tenderstage/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting Tender Stage");
            redirect_to("../tenderstage/index.php?pg=1");
        }
    }
?>