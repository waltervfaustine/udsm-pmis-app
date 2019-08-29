<?php require_once("../../../../imports/autoload.php"); ?>
<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['business_category_title']) && isset($_POST['business_category_body'])) {
            if(empty($_POST['business_category_title']) && !empty($_POST['business_category_body'])) {
                $session->message("Please Insert Business Category Title before submitting!");
                $_SESSION['business_category_body'] = $DBInstance->escapeValues($_POST['business_category_body']);
                redirect_to("../tender/index.php?pg=1");
            }else if(!empty($_POST['business_category_title']) && empty($_POST['business_category_body'])){
                $session->message("Please Insert Business Category Description before submitting!");
                $_SESSION['business_category_title'] = $DBInstance->escapeValues($_POST['business_category_title']);
                redirect_to("../tender/index.php?pg=1");
            }else if(empty($_POST['business_category_title']) && empty($_POST['business_category_body'])) {
                $session->message("Please Insert Business Category Title and Description before submitting!");
                redirect_to("../tender/index.php?pg=1");
            }else if(!empty($_POST['business_category_title']) && !empty($_POST['business_category_body'])) {
                $business_category_title = $DBInstance->escapeValues($_POST['business_category_title']);
                $business_category_body = $DBInstance->escapeValues($_POST['business_category_body']);
                if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $business_category_title) || preg_match('/[0-9]/', $business_category_title)) {
                    $_SESSION['business_category_title'] = $DBInstance->escapeValues($_POST['business_category_title']);
                    $_SESSION['business_category_body'] = $DBInstance->escapeValues($_POST['business_category_body']);
                    $session->message("Please remove special symbols or number in Business Category Title");
                    redirect_to("../tender/index.php?pg=1");
                }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $business_category_body) || preg_match('/[0-9]/', $business_category_body)) {
                    $_SESSION['business_category_title'] = $DBInstance->escapeValues($_POST['business_category_title']); 
                    $_SESSION['business_category_body'] = $DBInstance->escapeValues($_POST['business_category_body']);
                    $session->message("Please remove special symbols or number in Business Category Description");
                    redirect_to("../tender/index.php?pg=1");
                }else {
                    unset($_SESSION['business_category_title']);
                    unset($_SESSION['business_category_body']);

                    global $DBInstance;
                    $id = $DBInstance->escapeValues($_POST['business_category_id']);
                    $title = $DBInstance->escapeValues($_POST['business_category_title']);
                    $body = $DBInstance->escapeValues($_POST['business_category_body']);

                    if(isset($_POST['add_business_category'])) {
                        if(isset($_POST['business_category_id'])) {
                            if(!empty($_POST['business_category_id'])) {
                                $businessCategory = new BusinessCategory();
                                if ($businessCategory->addBusinessCategoryInstanceVar($id, $title, $body)){
                                    $businessCategory->addBusinessCategoryToDB();
                                }else {
                                    redirect_to("../tender/index.php?pg=1");
                                }
                            }
                        }else {
                            global $DBInstance;
                            $id = "";
                            $title = $DBInstance->escapeValues($_POST['business_category_title']);
                            $body = $DBInstance->escapeValues($_POST['business_category_body']);
                            $businessCategory = new BusinessCategory();
                            if ($businessCategory->addBusinessCategoryInstanceVar($id, $title, $body)){
                                $businessCategory->addBusinessCategoryToDB();
                            }else {
                                redirect_to("../tender/index.php?pg=1");
                            }
                        }
                    }
                    redirect_to("../tender/index.php?pg=1");
                }
            }
        }else {
            $session->message("Please insert Business Category and Description before submitting!");
        }

        
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $businessCategory = BusinessCategory::getByID($_GET['id']);
            if($businessCategory) {
                $businessCategory->deleteBusinessCategory();
            }else {
                $session->message("Business Category could not be deleted.");
                redirect_to("../tender/index.php?pg=1");
            }
        }else {
            redirect_to("../tender/index.php?pg=1");
        }
    }
?>
<?php global $DBInstance; if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>
