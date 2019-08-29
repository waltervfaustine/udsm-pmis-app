<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_user_requirement'])) {
            if((isset($_POST['requirement_title']) && isset($_POST['requirement_desc']) && isset($_FILES['requirement_docfile']) && isset($_POST['requirement_status']) && isset($_POST['requirement_requesterid']))) {
                if(empty($_POST['requirement_title']) && empty($_POST['requirement_desc']) && empty($_FILES['requirement_docfile']['name'])) {
                    $session->message("Please Insert Requirement Title, Description and Document before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if(!empty($_POST['requirement_title']) && empty($_POST['requirement_desc']) && empty($_FILES['requirement_docfile']['name'])) {
                    $_SESSION['requirement_title'] = $DBInstance->escapeValues($_POST['requirement_title']);
                    $session->message("Please Insert Requirement Description and Document before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if(empty($_POST['requirement_title']) && !empty($_POST['requirement_desc']) && empty($_FILES['requirement_docfile']['name'])) {
                    $_SESSION['requirement_desc'] = $DBInstance->escapeValues($_POST['requirement_desc']);
                    $session->message("Please Insert Requirement Title and Document file before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if(empty($_POST['requirement_title']) && empty($_POST['requirement_desc']) && !empty($_FILES['requirement_docfile']['name'])) {
                    $session->message("Please Insert Requirement Title and Description before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if(!empty($_POST['requirement_title']) && !empty($_POST['requirement_desc']) && empty($_FILES['requirement_docfile']['name'])) {
                    $_SESSION['requirement_title'] = $DBInstance->escapeValues($_POST['requirement_title']);
                    $_SESSION['requirement_desc'] = $DBInstance->escapeValues($_POST['requirement_desc']);
                    $session->message("Please choose Document file to upload before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if (!empty($_POST['requirement_title']) && empty($_POST['requirement_desc']) && !empty($_FILES['requirement_docfile']['name'])) {
                    $_SESSION['requirement_title'] = $DBInstance->escapeValues($_POST['requirement_title']);
                    $session->message("Please Insert Requirement Description before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if(empty($_POST['requirement_title']) && !empty($_POST['requirement_desc']) && !empty($_FILES['requirement_docfile']['name'])) {
                    $_SESSION['requirement_desc'] = $DBInstance->escapeValues($_POST['requirement_desc']);
                    $session->message("Please Insert Requirement Title before submitting!");
                    redirect_to("../tenderreq/index.php?pg=1");
                }else if(!empty($_POST['requirement_title']) && !empty($_POST['requirement_desc']) && !empty($_POST['requirement_status']) && !empty($_POST['requirement_requesterid']) && !empty($_FILES['requirement_docfile']['name'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_title']) || preg_match('/[0-9]/', $_POST['requirement_title'])) {
                        $session->message("Requirement Requirement Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderreq/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_desc']) || preg_match('/[0-9]/', $_POST['requirement_desc'])) {
                        $session->message("Requirement Requirement Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderreq/index.php?pg=1");
                    }else {
                        $_SESSION['requirement_title'] = $DBInstance->escapeValues($_POST['requirement_title']);
                        $_SESSION['requirement_desc'] = $DBInstance->escapeValues($_POST['requirement_desc']);
                        $_SESSION['requirement_status'] = $DBInstance->escapeValues($_POST['requirement_status']);
                        $_SESSION['requirement_requesterid'] = $DBInstance->escapeValues($_POST['requirement_requesterid']);
                        $document = $_FILES['requirement_docfile'];
                        $docfilename = $DBInstance->escapeValues($_FILES['requirement_docfile']['name']);

                        $userRequirement = new UserRequirement();
                        if(is_document($document['tmp_name'])) {
                            $id =  $_SESSION['requirementID'];
                            $title = $_SESSION['requirement_title'];
                            $body = $_SESSION['requirement_desc'];
                            $status = $_SESSION['requirement_status'];
                            $requesterID = $_SESSION['requirement_requesterid'];
                            $time = time();
                            if($userRequirement->addRequirementInstanceVar($id, $title, $body, $status, $requesterID, $time)) {
                                if($userRequirement->attachRequirementPropsToInstanceVars($document)) {
                                    if($userRequirement->preparingDataForSubmission()) {
                                        redirect_to("../tenderreq/index.php?pg=1");
                                    }else {
                                        redirect_to("../tenderreq/index.php?pg=1");
                                    }
                                }
                            }
                        }else {
                            $session->message("Please select Document to Upload");
                            redirect_to("../tenderreq/index.php?pg=1");
                        }
                    }
                }
            }else {
                $session->message("Some parameters are missing");
                redirect_to("../tenderreq/index.php?pg=1");
            }
        }else if(isset($_POST['update_user_requirement'])) {

            if(isset($_POST['update_user_requirement'])) {
            if(isset($_POST['requirement_title']) && isset($_POST['requirement_body']) && isset($_POST['user_requirement_filename']) && isset($_POST['user_requirement_type']) && isset($_POST['user_requirement_size']) && isset($_POST['requirement_id']) && isset($_POST['user_requirement_status']) && isset($_POST['user_requirement_requesterid']) && isset($_POST['user_requirement_timestamp'])) {
                if(!empty($_POST['requirement_title']) && !empty($_POST['requirement_body']) && !empty($_POST['user_requirement_filename']) && !empty($_POST['user_requirement_type']) && !empty($_POST['user_requirement_size']) && !empty($_POST['requirement_id']) && !empty($_POST['user_requirement_status']) && !empty($_POST['user_requirement_requesterid']) && !empty($_POST['user_requirement_timestamp'])) {
                    global $DBInstance;
                    $userRequirement = new UserRequirement();
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_title']) || preg_match('/[0-9]/', $_POST['requirement_title'])) {
                        $session->message("User Requirement Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderreq/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_body']) || preg_match('/[0-9]/', $_POST['requirement_body'])) {
                        $session->message("Requirement Requirement Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderreq/index.php?pg=1");
                    }else {
                        $userRequirement->id = $DBInstance->escapeValues($_POST['requirement_id']);
                        $userRequirement->title = $DBInstance->escapeValues($_POST['requirement_title']);
                        $userRequirement->body = $DBInstance->escapeValues($_POST['requirement_body']);
                        $userRequirement->filename = $DBInstance->escapeValues($_POST['user_requirement_filename']);
                        $userRequirement->type = $DBInstance->escapeValues($_POST['user_requirement_type']);
                        $userRequirement->size = $DBInstance->escapeValues($_POST['user_requirement_size']);
                        $userRequirement->status = $DBInstance->escapeValues($_POST['user_requirement_status']);
                        $userRequirement->requesterid = $DBInstance->escapeValues($_POST['user_requirement_requesterid']);
                        $userRequirement->timestamp = strtotime($DBInstance->escapeValues($_POST['user_requirement_timestamp']));
                        if($userRequirement->saveDataToDatabase()) {
                            redirect_to("../../tenderreq/index.php?pg=1");
                        }else {
                            redirect_to("../../tenderreq/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Some field are empty");
                    redirect_to("../../tenderreq/index.php?pg=1");
                }
            }else {
                $session->message("Some field are not set");
                redirect_to("../../tenderreq/index.php?pg=1");
            }
        }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $userRequirement = UserRequirement::getByID($_GET['id']);
            if($userRequirement) {
                if ($userRequirement->deleteUserRequirement()) {
                    redirect_to("../tenderreq/index.php?pg=1");
                }
            }else {
                redirect_to("../tenderreq/index.php?pg=1");
            }
        }else {
            redirect_to("../tenderreq/index.php?pg=1");
        }
    }
?>