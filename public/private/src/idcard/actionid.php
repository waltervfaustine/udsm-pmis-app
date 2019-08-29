<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_idcard'])) {
            if(isset($_POST['idcard_name']) && isset($_POST['idcard_desc'])) {
                if(empty($_POST['idcard_name']) && empty($_POST['idcard_desc'])) {
                    $session->message("Please Insert ID Card Title and Description before submitting!");
                    redirect_to("../idcard/index.php?pg=1");
                }else if(!empty($_POST['idcard_name']) && empty($_POST['idcard_desc'])) {
                    $_SESSION['idcard_name'] = $DBInstance->escapeValues($_POST['idcard_name']);
                    $session->message("Please Insert ID Card Description before submitting!");
                    redirect_to("../idcard/index.php?pg=1");
                }else if(empty($_POST['idcard_name']) && !empty($_POST['idcard_desc'])) {
                    $_SESSION['idcard_desc'] = $DBInstance->escapeValues($_POST['idcard_desc']);
                    $session->message("Please Insert ID Card Title before submitting!");
                    redirect_to("../idcard/index.php?pg=1");
                }else if(!empty($_POST['idcard_name']) && !empty($_POST['idcard_desc'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['idcard_name']) || preg_match('/[0-9]/', $_POST['idcard_name'])) {
                        $session->message("ID Card Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../idcard/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['idcard_desc']) || preg_match('/[0-9]/', $_POST['idcard_desc'])) {
                        $session->message("ID Card Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../idcard/index.php?pg=1");
                    }else {
                        $_SESSION['idcard_name'] = $DBInstance->escapeValues($_POST['idcard_name']);
                        $_SESSION['idcard_desc'] = $DBInstance->escapeValues($_POST['idcard_desc']);
                        $identificationCard = new IdentificationCard();

                        if (isset($_POST['idcard_id'])) {
                            $_SESSION['idcardID'] = $DBInstance->escapeValues($_POST['idcard_id']);
                            $id = $_SESSION['idcardID'];
                            $title = $_SESSION['idcard_name'];
                            $body = $_SESSION['idcard_desc'];
                            if($identificationCard->addIDCardToInstanceVars($id, $title, $body)) {
                                if($identificationCard->addIDCardToDB()) {
                                    unset($_SESSION['idcard_name']);
                                    unset($_SESSION['idcard_desc']);
                                    unset($_SESSION['idcardID']);
                                    redirect_to("../idcard/index.php?pg=1");
                                }else {
                                    redirect_to("../idcard/index.php?pg=1");
                                }
                            }
                                
                        }else {
                            if($identificationCard->isDataAssociatedWithExistInDB('name', $DBInstance->escapeValues($_POST['idcard_name']))) {
                                $session->message("ID Card ".$DBInstance->escapeValues($_POST['idcard_name'])." already exist.");
                                redirect_to("../idcard/index.php?pg=1");
                            }else {
                                $id = "";
                                $title = $_SESSION['idcard_name'];
                                $body = $_SESSION['idcard_desc'];
                                if($identificationCard->addIDCardToInstanceVars($id, $title, $body)) {
                                    if($identificationCard->addIDCardToDB()) {
                                        unset($_SESSION['idcard_name']);
                                        unset($_SESSION['idcard_desc']);
                                        redirect_to("../idcard/index.php?pg=1");
                                    }else {
                                        redirect_to("../idcard/index.php?pg=1");
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
            $identificationCard = IdentificationCard::getByID($_GET['id']);
            if($identificationCard) {
                if ($identificationCard->deleteIDCard()) {
                    redirect_to("../idcard/index.php?pg=1");
                }
            }else {
                $session->message("The ID Card could not be deleted.");
                redirect_to("../idcard/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting ID Card");
            redirect_to("../idcard/index.php?pg=1");
        }
    }
?>