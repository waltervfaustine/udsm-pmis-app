<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_tender_board'])) {
            if(isset($_POST['tenderboard_name']) && isset($_POST['tenderboard_desc'])) {
                if(empty($_POST['tenderboard_name']) && empty($_POST['tenderboard_desc'])) {
                    $session->message("Please Insert Tender Board Title and Description before submitting!");
                    redirect_to("../commboard/index.php?pg=1");
                }else if(!empty($_POST['tenderboard_name']) && empty($_POST['tenderboard_desc'])) {
                    $_SESSION['tenderboard_name'] = $DBInstance->escapeValues($_POST['tenderboard_name']);
                    $session->message("Please Insert Tender Board Description before submitting!");
                    redirect_to("../commboard/index.php?pg=1");
                }else if(empty($_POST['tenderboard_name']) && !empty($_POST['tenderboard_desc'])) {
                    $_SESSION['tenderboard_desc'] = $DBInstance->escapeValues($_POST['tenderboard_desc']);
                    $session->message("Please Insert Tender Board Title before submitting!");
                    redirect_to("../commboard/index.php?pg=1");
                }else if(!empty($_POST['tenderboard_name']) && !empty($_POST['tenderboard_desc'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['tenderboard_name']) || preg_match('/[0-9]/', $_POST['tenderboard_name'])) {
                        $session->message("Tender Board Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../commboard/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['tenderboard_desc']) || preg_match('/[0-9]/', $_POST['tenderboard_desc'])) {
                        $session->message("Tender Board Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../commboard/index.php?pg=1");
                    }else {
                        $_SESSION['tenderboard_name'] = $DBInstance->escapeValues($_POST['tenderboard_name']);
                        $_SESSION['tenderboard_desc'] = $DBInstance->escapeValues($_POST['tenderboard_desc']);
                        $tenderboards = new TenderBoard();

                        if (isset($_POST['tenderboard_id'])) {
                            $_SESSION['tenderboardID'] = $DBInstance->escapeValues($_POST['tenderboard_id']);
                            $id = $_SESSION['tenderboardID'];
                            $title = $_SESSION['tenderboard_name'];
                            $body = $_SESSION['tenderboard_desc'];
                            if($tenderboards->addTenderBoardToInstanceVars($id, $title, $body)) {
                                if($tenderboards->addTenderBoardToDB()) {
                                    unset($_SESSION['tenderboard_name']);
                                    unset($_SESSION['tenderboard_desc']);
                                    unset($_SESSION['tenderboardID']);
                                    redirect_to("../commboard/index.php?pg=1");
                                }else {
                                    redirect_to("../commboard/index.php?pg=1");
                                }
                            }
                                
                        }else {
                            if($tenderboards->isDataAssociatedWithExistInDB('name', $DBInstance->escapeValues($_POST['tenderboard_name']))) {
                                $session->message("Tender Board ".$DBInstance->escapeValues($_POST['tenderboard_name'])." already exist.");
                                redirect_to("../commboard/index.php?pg=1");
                            }else {
                                $id = "";
                                $title = $_SESSION['tenderboard_name'];
                                $body = $_SESSION['tenderboard_desc'];
                                if($tenderboards->addTenderBoardToInstanceVars($id, $title, $body)) {
                                    if($tenderboards->addTenderBoardToDB()) {
                                        unset($_SESSION['tenderboard_name']);
                                        unset($_SESSION['tenderboard_desc']);
                                        redirect_to("../commboard/index.php?pg=1");
                                    }else {
                                        redirect_to("../commboard/index.php?pg=1");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $tenderboards = TenderBoard::getByID($_GET['id']);
            if($tenderboards) {
                if ($tenderboards->deleteTenderBoard()) {
                    redirect_to("../commboard/index.php?pg=1");
                }
            }else {
                $session->message("The Tender Board could not be deleted.");
                redirect_to("../commboard/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting Tender Board");
            redirect_to("../commboard/index.php?pg=1");
        }
    }
?>