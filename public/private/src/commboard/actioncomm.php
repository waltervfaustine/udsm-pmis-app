<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_committee_name'])) {
            if(isset($_POST['committee_name']) && isset($_POST['committee_desc'])) {
                if(empty($_POST['committee_name']) && empty($_POST['committee_desc'])) {
                    $session->message("Please Insert Committee Title and Description before submitting!");
                    redirect_to("../commboard/index.php?pg=1");
                }else if(!empty($_POST['committee_name']) && empty($_POST['committee_desc'])) {
                    $_SESSION['committee_name'] = $DBInstance->escapeValues($_POST['committee_name']);
                    $session->message("Please Insert Committee Description before submitting!");
                    redirect_to("../commboard/index.php?pg=1");
                }else if(empty($_POST['committee_name']) && !empty($_POST['committee_desc'])) {
                    $_SESSION['committee_desc'] = $DBInstance->escapeValues($_POST['committee_desc']);
                    $session->message("Please Insert Committee Title before submitting!");
                    redirect_to("../commboard/index.php?pg=1");
                }else if(!empty($_POST['committee_name']) && !empty($_POST['committee_desc'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['committee_name']) || preg_match('/[0-9]/', $_POST['committee_name'])) {
                        $session->message("Committee Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../commboard/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['committee_desc']) || preg_match('/[0-9]/', $_POST['committee_desc'])) {
                        $session->message("Committee Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../commboard/index.php?pg=1");
                    }else {
                        $_SESSION['committee_name'] = $DBInstance->escapeValues($_POST['committee_name']);
                        $_SESSION['committee_desc'] = $DBInstance->escapeValues($_POST['committee_desc']);
                        $committee = new Committee();

                        if (isset($_POST['committee_id'])) {
                            $_SESSION['committeeID'] = $DBInstance->escapeValues($_POST['committee_id']);
                            $id = $_SESSION['committeeID'];
                            $title = $_SESSION['committee_name'];
                            $body = $_SESSION['committee_desc'];
                            if($committee->addCommitteeToInstanceVars($id, $title, $body)) {
                                if($committee->addCommitteeToDB()) {
                                    unset($_SESSION['committee_name']);
                                    unset($_SESSION['committee_desc']);
                                    unset($_SESSION['committeeID']);
                                    redirect_to("../commboard/index.php?pg=1");
                                }else {
                                    redirect_to("../commboard/index.php?pg=1");
                                }
                            }
                                
                        }else {
                            if($committee->isDataAssociatedWithExistInDB('name', $DBInstance->escapeValues($_POST['committee_name']))) {
                                $session->message("Committee ".$DBInstance->escapeValues($_POST['committee_name'])." already exist.");
                                redirect_to("../commboard/index.php?pg=1");
                            }else {
                                $id = "";
                                $title = $_SESSION['committee_name'];
                                $body = $_SESSION['committee_desc'];
                                if($committee->addCommitteeToInstanceVars($id, $title, $body)) {
                                    if($committee->addCommitteeToDB()) {
                                        unset($_SESSION['committee_name']);
                                        unset($_SESSION['committee_desc']);
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
            $committee = Committee::getByID($_GET['id']);
            if($committee) {
                if ($committee->deleteCommittee()) {
                    redirect_to("../commboard/index.php?pg=1");
                }
            }else {
                $session->message("The Committee could not be deleted.");
                redirect_to("../commboard/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting Committee");
            redirect_to("../commboard/index.php?pg=1");
        }
    }
?>