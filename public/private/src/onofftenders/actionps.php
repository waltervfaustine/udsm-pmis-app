<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['post_news'])) {
            if(isset($_POST['news_title']) && isset($_POST['news_body'])) {
                if(empty($_POST['news_title']) && empty($_POST['news_body'])) {
                    $session->message("Please Insert News Title and Description before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(!empty($_POST['news_title']) && empty($_POST['news_body'])) {
                    $_SESSION['news_title'] = $DBInstance->escapeValues($_POST['news_title']);
                    $session->message("Please Insert News Description before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(empty($_POST['news_title']) && !empty($_POST['news_body'])) {
                    $_SESSION['news_body'] = $DBInstance->escapeValues($_POST['news_body']);
                    $session->message("Please Insert News Title before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(!empty($_POST['news_title']) && !empty($_POST['news_body'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['news_title']) || preg_match('/[0-9]/', $_POST['news_title'])) {
                        $session->message("News Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../publicarea/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['news_body']) || preg_match('/[0-9]/', $_POST['news_body'])) {
                        $session->message("News Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../publicarea/index.php?pg=1");
                    }else {
                        $_SESSION['news_title'] = $DBInstance->escapeValues($_POST['news_title']);
                        $_SESSION['news_body'] = $DBInstance->escapeValues($_POST['news_body']);
                        $newsUpdate = new News();

                        if (isset($_POST['news_id'])) {
                            $_SESSION['newsID'] = $DBInstance->escapeValues($_POST['news_id']);
                            $id = $_SESSION['newsID'];
                            $title = $_SESSION['news_title'];
                            $body = $_SESSION['news_body'];
                            if($newsUpdate->addToNewsDataInstanceVar($id, $title, $body)) {
                                if($newsUpdate->addNewsToDB()) {
                                    unset($_SESSION['news_title']);
                                    unset($_SESSION['news_body']);
                                    unset($_SESSION['newsID']);
                                    redirect_to("../publicarea/index.php?pg=1");
                                }else {
                                    redirect_to("../publicarea/index.php?pg=1");
                                }
                            }
                                
                        }else {
                            if($newsUpdate->isDataAssociatedWithExistInDB('title', $DBInstance->escapeValues($_POST['news_title']))) {
                                $session->message("News ".$DBInstance->escapeValues($_POST['news_title'])." already exist.");
                                redirect_to("../publicarea/index.php?pg=1");
                            }else {
                                $id = "";
                                $title = $_SESSION['news_title'];
                                $body = $_SESSION['news_body'];
                                if($newsUpdate->addToNewsDataInstanceVar($id, $title, $body)) {
                                    if($newsUpdate->addNewsToDB()) {
                                        redirect_to("../publicarea/index.php?pg=1");
                                    }else {
                                        redirect_to("../publicarea/index.php?pg=1");
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
            $newsUpdate = News::getByID($_GET['id']);
            if($newsUpdate) {
                if ($newsUpdate->deleteUserNews()) {
                    redirect_to("../publicarea/index.php?pg=1");
                }
            }else {
                $session->message("The Role could not be deleted.");
                redirect_to("../publicarea/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting News");
            redirect_to("../publicarea/index.php?pg=1");
        }
    }
?>