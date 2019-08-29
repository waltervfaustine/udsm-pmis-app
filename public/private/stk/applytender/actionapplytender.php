<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['send_application'])) {
            if(isset($_POST['stkapply_comment']) && isset($_FILES['stktender_docfile']) && isset($_POST['stkapply_stakeholderid']) && isset($_POST['stkapply_tenderid'])) {
                if(empty($_POST['stkapply_comment']) && empty($_FILES['stktender_docfile']['name'])) {
                    $session->message("Please insert Comment and Application Document before submitting");
                    redirect_to("../applytender/index.php?pg=1");
                }else if(!empty($_POST['stkapply_comment']) && empty($_FILES['stktender_docfile']['name'])) {
                    $session->message("Please select the document file before submitting");
                    redirect_to("../applytender/index.php?pg=1");
                }else if(empty($_POST['stkapply_comment']) && !empty($_FILES['stktender_docfile']['name'])) {
                    $session->message("Please type comment before submitting");
                    redirect_to("../applytender/index.php?pg=1");
                }else if(!empty($_POST['stkapply_comment']) && !empty($_FILES['stktender_docfile']['name'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['stkapply_comment'])) {
                        $session->message("Comment Cannot contain special symbols or number, only text is allowed");
                        redirect_to("../applytender/index.php?pg=1");
                    }else {
                        $_SESSION['stkapply_comment'] = $DBInstance->escapeValues($_POST['stkapply_comment']);
                        $_SESSION['stkapply_stakeholderid'] = $DBInstance->escapeValues($_POST['stkapply_stakeholderid']);
                        $_SESSION['stkapply_tenderid'] = $DBInstance->escapeValues($_POST['stkapply_tenderid']);
                        $docfilename = $DBInstance->escapeValues($_FILES['stktender_docfile']['name']);
                        $document = $_FILES['stktender_docfile'];

                        $tenderApplication = new TenderApplication();
                        if(is_document($document['tmp_name'])) {
                            $tenderApplication->comment = $_SESSION['stkapply_comment'];
                            $tenderApplication->stakeholderid = $_SESSION['stkapply_stakeholderid'];
                            $tenderApplication->tenderid = $_SESSION['stkapply_tenderid'];
                            $tenderApplication->timestamp = time();
                            $tenderApplication->status = 'false';
                            $tenderApplication->award = 'false';

                            if($tenderApplication->attachApplicationDocumentPropsToInstanceVars($document)) {
                                if($tenderApplication->preparingDataForSubmission()) {
                                    
                                }else {
                                    redirect_to("../applytender/index.php?pg=1");
                                }
                            }else {
                                $session->message("Failed to attach document! Please retry.");
                                redirect_to("../applytender/index.php?pg=1");
                            }
                        }else {
                            $session->message("Please select Document to Upload");
                            redirect_to("../applytender/index.php?pg=1");
                        }
                    }
                }else {
                    redirect_to("../applytender/index.php?pg=1");
                }
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $tenderApplication = TenderApplication::getByID($_GET['id']);
            if($tenderApplication) {
                if ($tenderApplication->deleteTenderPosting()) {
                    redirect_to("../applytender/index.php?pg=1");
                }
            }else {
                redirect_to("../applytender/index.php?pg=1");
            }
        }else {
            redirect_to("../applytender/index.php?pg=1");
        }
    }
?>