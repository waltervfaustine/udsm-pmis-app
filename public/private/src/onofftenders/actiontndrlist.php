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
        }else if(isset($_POST['update_ongoing_status'])) {
            if(isset($_POST['ongoing_tender_status']) && isset($_POST['ongoing_tender_id'])) {
                if(!empty($_POST['ongoing_tender_status']) && !empty($_POST['ongoing_tender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['ongoing_tender_status'])) {
                        $session->message("Tender Status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../onofftenders/index.php?pg=1");
                    }else {
                        $ongoing_tender_id = $DBInstance->escapeValues($_POST['ongoing_tender_id']);
                        $ongoing_tender_status = $DBInstance->escapeValues($_POST['ongoing_tender_status']);
                        $stakeholder_colname = 'status';
                        
                        if(TenderPosting::updateDataToDatabase($ongoing_tender_id, $stakeholder_colname, $ongoing_tender_status)) {
                            $session->message("Tender Status is successfully changed");
                            redirect_to("../onofftenders/index.php?pg=1");
                        }else {
                            $session->message("Tender Status failed to be changed");
                            redirect_to("../onofftenders/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failure to update status");
                    redirect_to("../onofftenders/index.php?pg=1");
                }
            }else{
                $session->message("Failure to update status");
                redirect_to("../onofftenders/index.php?pg=1");
            }
        }else if(isset($_POST['close_tender_status'])) {
            if(isset($_POST['closed_tender_status']) && isset($_POST['close_tender_id'])) {
                if(!empty($_POST['closed_tender_status']) && !empty($_POST['close_tender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['closed_tender_status'])) {
                        $session->message("Tender Status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../onofftenders/index.php?pg=1");
                    }else {
                        $close_tender_id = $DBInstance->escapeValues($_POST['close_tender_id']);
                        $closed_tender_status = $DBInstance->escapeValues($_POST['closed_tender_status']);
                        $stakeholder_colname = 'status';
                        
                        if(TenderPosting::updateDataToDatabase($close_tender_id, $stakeholder_colname, $closed_tender_status)) {
                            $session->message("Tender Status is successfully changed");
                            redirect_to("../onofftenders/index.php?pg=1");
                        }else {
                            $session->message("Tender Status failed to be changed");
                            redirect_to("../onofftenders/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Failure to update status");
                    redirect_to("../onofftenders/index.php?pg=1");
                }
            }else {
                $session->message("Failure to update status");
                redirect_to("../onofftenders/index.php?pg=1");
            }
        }else if(isset($_POST['update_unapproved_status'])) {
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
        }else if(isset($_POST['adding_tender_stage'])) {
            if(isset($_POST['tender_progress_id']) && isset($_POST['ongoing_tender_id'])) {
                if(!empty($_POST['tender_progress_id']) && !empty($_POST['ongoing_tender_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $_POST['tender_progress_id'])) {
                        $session->message("Tender Progress Update cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../onofftenders/ongoing.php?pg=1");
                    }else {
                        $ongoing_tender_id = $DBInstance->escapeValues($_POST['ongoing_tender_id']);
                        $tender_progress_id = $DBInstance->escapeValues($_POST['tender_progress_id']);

                        if(TenderProgressUpdate::checkIfTenderIsAtAlreadyAtCurrentAddedStage($ongoing_tender_id, $tender_progress_id)) {
                            $session->message("This Tender Is already at that particular stage you are trying to Update.");
                            redirect_to("../onofftenders/ongoing.php?pg=1");
                        }else {
                            $tenderprogressupdate = new TenderProgressUpdate();
                            $tenderprogressupdate->stageid = $tender_progress_id;
                            $tenderprogressupdate->tenderid = $ongoing_tender_id;
                            $tenderprogressupdate->timestamp = time();
                            $tenderprogressupdate->updaterid = $DBInstance->escapeValues($_SESSION['currentUID']);
                            
                            if($tenderprogressupdate->AddTenderProgrssUpdateToDatabase()) {
                                $session->message("Tender Progress Update is successfully changed");
                                redirect_to("../onofftenders/ongoing.php?pg=1");
                            }else {
                                $session->message("Tender Progress Update failed to be changed");
                                redirect_to("../onofftenders/ongoing.php?pg=1");
                            }
                        }
                    }
                }else {
                    $session->message("Failure to update Tender Progress Update");
                    redirect_to("../onofftenders/ongoing.php?pg=1");
                }
            }else {
                $session->message("Failure to update Tender Progress Update");
                redirect_to("../onofftenders/ongoing.php?pg=1");
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