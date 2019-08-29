<?php require_once("../../../../imports/autoload.php"); ?>
<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['tender_category_title']) && isset($_POST['tender_category_body'])) {
            if(empty($_POST['tender_category_title']) && !empty($_POST['tender_category_body'])) {
                $session->message("Please Insert Tender Category Title before submitting!");
                $_SESSION['tender_category_body'] = $DBInstance->escapeValues($_POST['tender_category_body']);
                redirect_to("../tender/index.php?pg=1");
            }else if(!empty($_POST['tender_category_title']) && empty($_POST['tender_category_body'])){
                $session->message("Please Insert Tender Category Description before submitting!");
                $_SESSION['tender_category_title'] = $DBInstance->escapeValues($_POST['tender_category_title']);
                redirect_to("../tender/index.php?pg=1");
            }else if(empty($_POST['tender_category_title']) && empty($_POST['tender_category_body'])) {
                $session->message("Please Insert Tender Category Title and Description before submitting!");
                redirect_to("../tender/index.php?pg=1");
            }else if(!empty($_POST['tender_category_title']) && !empty($_POST['tender_category_body'])) {
                $tender_category_title = $DBInstance->escapeValues($_POST['tender_category_title']);
                $tender_category_body = $DBInstance->escapeValues($_POST['tender_category_body']);
                if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tender_category_title) || preg_match('/[0-9]/', $tender_category_title)) {
                    $_SESSION['tender_category_title'] = $DBInstance->escapeValues($_POST['tender_category_title']);
                    $_SESSION['tender_category_body'] = $DBInstance->escapeValues($_POST['tender_category_body']);
                    $session->message("Please remove special symbols or number in Tender Category Title");
                    redirect_to("../tender/index.php?pg=1");
                }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tender_category_body) || preg_match('/[0-9]/', $tender_category_body)) {
                    $_SESSION['tender_category_title'] = $DBInstance->escapeValues($_POST['tender_category_title']); 
                    $_SESSION['tender_category_body'] = $DBInstance->escapeValues($_POST['tender_category_body']);
                    $session->message("Please remove special symbols or number in Tender Category Description");
                    redirect_to("../tender/index.php?pg=1");
                }else {
                    unset($_SESSION['tender_category_title']);
                    unset($_SESSION['tender_category_body']);

                    global $DBInstance;
                    $id = $DBInstance->escapeValues($_POST['tender_category_id']);
                    $title = $DBInstance->escapeValues($_POST['tender_category_title']);
                    $body = $DBInstance->escapeValues($_POST['tender_category_body']);

                    if(isset($_POST['add_tender_category'])) {
                        if(isset($_POST['tender_category_id'])) {
                            if(!empty($_POST['tender_category_id'])) {
                                $tenderCategory = new TenderCategory();
                                if ($tenderCategory->addTenderCategoryInstanceVar($id, $title, $body)){
                                    $tenderCategory->addTenderCategoryToDB();
                                }else {
                                    redirect_to("../tender/index.php?pg=1");
                                }
                            }
                        }else {
                            global $DBInstance;
                            $id = "";
                            $title = $DBInstance->escapeValues($_POST['tender_category_title']);
                            $body = $DBInstance->escapeValues($_POST['tender_category_body']);
                            $tenderCategory = new TenderCategory();
                            if ($tenderCategory->addTenderCategoryInstanceVar($id, $title, $body)){
                                $tenderCategory->addTenderCategoryToDB();
                            }else {
                                redirect_to("../tender/index.php?pg=1");
                            }
                        }
                    }
                    redirect_to("../tender/index.php?pg=1");
                }
            }
        }else {
            $session->message("Please insert user Tender Category and Description before submitting!");
        }

        
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $tenderCategory = TenderCategory::getByID($_GET['id']);
            if($tenderCategory) {
                $tenderCategory->deleteTenderCategory();
            }else {
                $session->message("Tender Category could not be deleted.");
                redirect_to("../tender/index.php?pg=1");
            }
        }else {
            redirect_to("../tender/index.php?pg=1");
        }
    }
?>
<?php global $DBInstance; if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
