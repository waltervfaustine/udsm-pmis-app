<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['post_tender'])) {
            if((isset($_POST['preptender_title']) && isset($_POST['preptender_desc']) && isset($_FILES['preptender_docfile']) && isset($_POST['preptender_categoryid']) && isset($_POST['preptender_status'])) && 
                isset($_POST['preptender_requesterid']) && isset($_POST['preptender_currentuid']) && isset($_POST['preptender_reqid']) && isset($_POST['preptender_timestamp']) &&  isset($_POST['preptender_committeeid']) &&  isset($_POST['preptender_tenderboardid'])
            ) {
                if(empty($_POST['preptender_title']) && empty($_POST['preptender_desc']) && empty($_FILES['preptender_docfile']['name'])) {
                    $session->message("Please Insert Tender Title, Description and Document before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(!empty($_POST['preptender_title']) && empty($_POST['preptender_desc']) && empty($_FILES['preptender_docfile']['name'])) {
                    $_SESSION['preptender_title'] = $DBInstance->escapeValues($_POST['preptender_title']);
                    $session->message("Please Insert Tender Description and Document before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(empty($_POST['preptender_title']) && !empty($_POST['preptender_desc']) && empty($_FILES['preptender_docfile']['name'])) {
                    $_SESSION['preptender_desc'] = $DBInstance->escapeValues($_POST['preptender_desc']);
                    $session->message("Please Insert Tender Title and Document file before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(empty($_POST['preptender_title']) && empty($_POST['preptender_desc']) && !empty($_FILES['preptender_docfile']['name'])) {
                    $session->message("Please Insert Tender Title and Description before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(!empty($_POST['preptender_title']) && !empty($_POST['preptender_desc']) && empty($_FILES['preptender_docfile']['name'])) {
                    $_SESSION['preptender_title'] = $DBInstance->escapeValues($_POST['preptender_title']);
                    $_SESSION['preptender_desc'] = $DBInstance->escapeValues($_POST['preptender_desc']);
                    $session->message("Please choose Document file to upload before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if (!empty($_POST['preptender_title']) && empty($_POST['preptender_desc']) && !empty($_FILES['preptender_docfile']['name'])) {
                    $_SESSION['preptender_title'] = $DBInstance->escapeValues($_POST['preptender_title']);
                    $session->message("Please Insert Tender Description before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(empty($_POST['preptender_title']) && !empty($_POST['preptender_desc']) && !empty($_FILES['preptender_docfile']['name'])) {
                    $_SESSION['preptender_desc'] = $DBInstance->escapeValues($_POST['preptender_desc']);
                    $session->message("Please Insert Tender Title before submitting!");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(!empty($_POST['preptender_title']) && !empty($_POST['preptender_desc']) && !empty($_POST['preptender_status']) && !empty($_POST['preptender_requesterid']) && !empty($_FILES['preptender_docfile']['name'])
                && !empty($_POST['preptender_currentuid']) && !empty($_POST['preptender_reqid']) && !empty($_POST['preptender_timestamp']) && !empty($_POST['preptender_categoryid']) && !empty($_POST['preptender_committeeid']) && !empty($_POST['preptender_tenderboardid']) 
                ) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['preptender_title']) || preg_match('/[0-9]/', $_POST['preptender_title'])) {
                        $session->message("Tender Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../preptender/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['preptender_desc']) || preg_match('/[0-9]/', $_POST['preptender_desc'])) {
                        $session->message("Tender Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../preptender/index.php?pg=1");
                    }else {
                        $_SESSION['preptender_title'] = $DBInstance->escapeValues($_POST['preptender_title']);
                        $_SESSION['preptender_desc'] = $DBInstance->escapeValues($_POST['preptender_desc']);
                        $_SESSION['preptender_categoryid'] = $DBInstance->escapeValues($_POST['preptender_categoryid']);
                        $_SESSION['preptender_currentuid'] = $DBInstance->escapeValues($_POST['preptender_currentuid']);
                        $_SESSION['preptender_requesterid'] = $DBInstance->escapeValues($_POST['preptender_requesterid']);
                        $_SESSION['preptender_reqid'] = $DBInstance->escapeValues($_POST['preptender_reqid']);
                        $_SESSION['preptender_timestamp'] = $DBInstance->escapeValues($_POST['preptender_timestamp']);
                        $_SESSION['preptender_status'] = $DBInstance->escapeValues($_POST['preptender_status']);
                        $_SESSION['preptender_committeeid'] = $DBInstance->escapeValues($_POST['preptender_committeeid']);
                        $_SESSION['preptender_tenderboardid'] = $DBInstance->escapeValues($_POST['preptender_tenderboardid']);
                        $document = $_FILES['preptender_docfile'];
                        $docfilename = $DBInstance->escapeValues($_FILES['preptender_docfile']['name']);

                        $tenderposting = new TenderPosting();
                        if(is_document($document['tmp_name'])) {
                            $tenderposting->title = $_SESSION['preptender_title'];
                            $tenderposting->body = $_SESSION['preptender_desc'];
                            $tenderposting->categoryid = $_SESSION['preptender_categoryid'];
                            $tenderposting->posteruid = $_SESSION['preptender_currentuid'];
                            $tenderposting->requesteruid = $_SESSION['preptender_requesterid'];
                            $tenderposting->requirementid = $_SESSION['preptender_reqid'];
                            $tenderposting->timestamp = $_SESSION['preptender_timestamp'];
                            $tenderposting->status = $_SESSION['preptender_status'];
                            $tenderposting->committeeid = $_SESSION['preptender_committeeid'];
                            $tenderposting->boardid = $_SESSION['preptender_tenderboardid'];

                            if($tenderposting->attachTendersPropsToInstanceVars($document)) {
                                if($tenderposting->preparingDataForSubmission()) {
                                    // $sql = "SELECT ";
                                    // $sql .= "DISTINCT email FROM tenderlist, stakeholders WHERE stakeholders.supply_id = $tenderposting->categoryid";
                                    // $result = mysqli_query($DBInstance->returnConnection(), $sql);
                                    
                                    // while($row = mysqli_fetch_array($result)) {
                                    //     $emails[] = $row['email'];
                                    // }


                                    // $subject = "Tender Notification.";
                                    // $body = $stakeholder->sendEmailToStakeholderTenderNotification();
                                    // if($tenderposting->sendEmailStakeholdersCategory($subject, $body, $emails)) {
                                    //     // redirect_to("../preptender/index.php?pg=1");
                                    // }
                                    redirect_to("../preptender/index.php?pg=1");
                                }else {
                                    redirect_to("../preptender/index.php?pg=1");
                                }
                            }else {
                                $session->message("Failed to attach document! Please retry.");
                                redirect_to("../preptender/index.php?pg=1");
                            }
                        }else {
                            $session->message("Please select Document to Upload");
                            redirect_to("../preptender/index.php?pg=1");
                        }
                    }
                }
            }else {
                echo $session->message("Some parameters are missing");
                redirect_to("../preptender/index.php?pg=1");
            }

        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $userRequirement = TenderPosting::getByID($_GET['id']);
            if($userRequirement) {
                if ($userRequirement->deleteTenderPosting()) {
                    redirect_to("../preptender/index.php?pg=1");
                }
            }else {
                redirect_to("../preptender/index.php?pg=1");
            }
        }else {
            redirect_to("../preptender/index.php?pg=1");
        }
    }
?>