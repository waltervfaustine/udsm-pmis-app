<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_document'])) {
            if(isset($_POST['document_title']) && isset($_POST['document_desc']) && isset($_POST['document_id']) && isset($_FILES['document_file'])) {
                if(empty($_POST['document_title']) && empty($_POST['document_desc']) && empty($_FILES['document_file']['name'])) {
                    $session->message("Please Insert Document Title, Description and Document before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if(!empty($_POST['document_title']) && empty($_POST['document_desc']) && empty($_FILES['document_file']['name'])) {
                    $_SESSION['document_title'] = $DBInstance->escapeValues($_POST['document_title']);
                    $session->message("Please Insert Document Description and Document before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if(empty($_POST['document_title']) && !empty($_POST['document_desc']) && empty($_FILES['document_file']['name'])) {
                    $_SESSION['document_desc'] = $DBInstance->escapeValues($_POST['document_desc']);
                    $session->message("Please Insert Document Title and Document file before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if(empty($_POST['document_title']) && empty($_POST['document_desc']) && !empty($_FILES['document_file']['name'])) {
                    $session->message("Please Insert Document Title and Description before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if(!empty($_POST['document_title']) && !empty($_POST['document_desc']) && empty($_FILES['document_file']['name'])) {
                    $_SESSION['document_title'] = $DBInstance->escapeValues($_POST['document_title']);
                    $_SESSION['document_desc'] = $DBInstance->escapeValues($_POST['document_desc']);
                    $session->message("Please choose Document file to upload before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if (!empty($_POST['document_title']) && empty($_POST['document_desc']) && !empty($_FILES['document_file']['name'])) {
                    $_SESSION['document_title'] = $DBInstance->escapeValues($_POST['document_title']);
                    $session->message("Please Insert Document Description before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if(empty($_POST['document_title']) && !empty($_POST['document_desc']) && !empty($_FILES['document_file']['name'])) {
                    $_SESSION['document_desc'] = $DBInstance->escapeValues($_POST['document_desc']);
                    $session->message("Please Insert Document Title before submitting!");
                    redirect_to("../tenderform/index.php?pg=1");
                }else if(!empty($_POST['document_title']) && !empty($_POST['document_desc']) && !empty($_FILES['document_file']['name'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['document_title']) || preg_match('/[0-9]/', $_POST['document_title'])) {
                        $session->message("Requirement Document Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderform/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['document_desc']) || preg_match('/[0-9]/', $_POST['document_desc'])) {
                        $session->message("Requirement Document Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderform/index.php?pg=1");
                    }else {
                        $_SESSION['document_title'] = $DBInstance->escapeValues($_POST['document_title']);
                        $_SESSION['document_desc'] = $DBInstance->escapeValues($_POST['document_desc']);
                        $document = $_FILES['document_file'];
                        $docfilename = $DBInstance->escapeValues($_FILES['document_file']['name']);
                        $posteruid = $DBInstance->escapeValues($_SESSION['currentUID']);
                        $timestamp = time();

                        $requirementForm = new RequirementDocument();

                        if(is_word_document($docfilename)) {
                            $id = "";
                            $title = $_SESSION['document_title'];
                            $body = $_SESSION['document_desc'];
                            if($requirementForm->addDocumentInstanceVar($id, $title, $body, $posteruid, $timestamp)) {
                                if($requirementForm->attachDocumentPropsToInstanceVars($document)) {
                                    if($requirementForm->preparingDataForSubmission()) {
                                        redirect_to("../tenderform/index.php?pg=1");
                                    }else {
                                        redirect_to("../tenderform/index.php?pg=1");
                                    }
                                }else {
                                    $session->message("Failed in submitting requirement form");
                                    redirect_to("../tenderform/index.php?pg=1");
                                }
                            }else {
                                $session->message("Failed to submit data");
                                redirect_to("../tenderform/index.php?pg=1");
                            }
                        }else {
                            $session->message("Word Document only are allowed to be uploaded here");
                            redirect_to("../tenderform/index.php?pg=1");
                        }
                    }
                    
                }
            }
        }else if(isset($_POST['update_document'])) {
            if(isset($_POST['document_title']) && isset($_POST['document_desc']) && isset($_POST['document_filename']) && isset($_POST['document_type']) && isset($_POST['document_size']) && isset($_POST['document_id'])) {
                if(!empty($_POST['document_title']) && !empty($_POST['document_desc']) && !empty($_POST['document_filename']) && !empty($_POST['document_type']) && !empty($_POST['document_size']) && !empty($_POST['document_id'])) {
                    global $DBInstance;
                    $requirementForm = new RequirementDocument();
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['document_title']) || preg_match('/[0-9]/', $_POST['document_title'])) {
                        $session->message("Requirement Document Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderform/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['document_desc']) || preg_match('/[0-9]/', $_POST['document_desc'])) {
                        $session->message("Requirement Document Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../tenderform/index.php?pg=1");
                    }else {
                        $requirementForm->id = $DBInstance->escapeValues($_POST['document_id']);
                        $requirementForm->title = $DBInstance->escapeValues($_POST['document_title']);
                        $requirementForm->body = $DBInstance->escapeValues($_POST['document_desc']);
                        $requirementForm->filename = $DBInstance->escapeValues($_POST['document_filename']);
                        $requirementForm->type = $DBInstance->escapeValues($_POST['document_type']);
                        $requirementForm->size = $DBInstance->escapeValues($_POST['document_size']);
                        if($requirementForm->saveDataToDatabase()) {
                            redirect_to("../tenderform/index.php?pg=1");
                        }
                    }
                }
            }
        }
        
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $requirementDocument = RequirementDocument::getByID($_GET['id']);
            if($requirementDocument) {
                if ($requirementDocument->deleteDocuments()) {
                    redirect_to("../tenderform/index.php?pg=1");
                }
            }else {
                $session->message("The Document could not be deleted.");
                redirect_to("../tenderform/index.php?pg=1");
            }
        }else {
            redirect_to("../tenderform/index.php?pg=1");
        }
    }
?>