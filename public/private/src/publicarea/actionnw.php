<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['post_story'])) {
            if(isset($_POST['story_title']) && isset($_POST['story_body']) && isset($_POST['story_id']) && isset($_FILES['story_photo']) && isset($_POST['story_status'])) {
                if(empty($_POST['story_title']) && empty($_POST['story_body']) && empty($_FILES['story_photo']['name'])) {
                    $session->message("Please Insert News Title, Description and Photo before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(!empty($_POST['story_title']) && empty($_POST['story_body']) && empty($_FILES['story_photo']['name'])) {
                    $_SESSION['story_title'] = $DBInstance->escapeValues($_POST['story_title']);
                    $session->message("Please Insert News Body and Photo before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(empty($_POST['story_title']) && !empty($_POST['story_body']) && empty($_FILES['story_photo']['name'])) {
                    $_SESSION['story_body'] = $DBInstance->escapeValues($_POST['story_body']);
                    $session->message("Please Insert News Title and Photo file before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(empty($_POST['story_title']) && empty($_POST['story_body']) && !empty($_FILES['story_photo']['name'])) {
                    $session->message("Please Insert News Title and Description before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(!empty($_POST['story_title']) && !empty($_POST['story_body']) && empty($_FILES['story_photo']['name'])) {
                    $_SESSION['story_title'] = $DBInstance->escapeValues($_POST['story_title']);
                    $_SESSION['story_body'] = $DBInstance->escapeValues($_POST['story_body']);
                    $session->message("Please choose Photo file to upload before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if (!empty($_POST['story_title']) && empty($_POST['story_body']) && !empty($_FILES['story_photo']['name'])) {
                    $_SESSION['story_title'] = $DBInstance->escapeValues($_POST['story_title']);
                    $session->message("Please Insert News Body before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(empty($_POST['story_title']) && !empty($_POST['story_body']) && !empty($_FILES['story_photo']['name'])) {
                    $_SESSION['story_body'] = $DBInstance->escapeValues($_POST['story_body']);
                    $session->message("Please Insert News Title before submitting!");
                    redirect_to("../publicarea/index.php?pg=1");
                }else if(!empty($_POST['story_title']) && !empty($_POST['story_body']) && !empty($_FILES['story_photo']['name'])) {
                    $_SESSION['story_title'] = $DBInstance->escapeValues($_POST['story_title']);
                    $_SESSION['story_body'] = $DBInstance->escapeValues($_POST['story_body']);
                    $_SESSION['story_status'] = $DBInstance->escapeValues($_POST['story_status']);

                    $publicphoto = $_FILES['story_photo'];
                    $docfilename = $DBInstance->escapeValues($_FILES['story_photo']['name']);

                    $publicStory = new Story();
                    if(is_image($publicphoto['tmp_name'])) {
                        $id = "";
                        $title = $_SESSION['story_title'];
                        $body = $_SESSION['story_body'];
                        $status = $_SESSION['story_status'];
                        if($publicStory->addStoryInstanceVar($id, $title, $body, $status)) {
                            if($publicStory->attachStoryPhotoPropsToInstanceVars($publicphoto)) {
                                if($publicStory->preparingDataForSubmission()) {
                                    redirect_to("../publicarea/index.php?pg=1");
                                }else {
                                    redirect_to("../publicarea/index.php?pg=1");
                                }
                            }
                        }
                    }else {
                        $session->message("Please choose Photo/Image to Upload");
                        redirect_to("../publicarea/index.php?pg=1");
                    }

                    // if(preg_match('/[\^£$%&*()}{@#~><>|=_+¬-]/', $_POST['story_title']) || preg_match('/[0-9]/', $_POST['story_title'])) {
                    //     $session->message("News Title can not contain special symbols or number eg: 123456!@#");
                    //     redirect_to("../publicarea/index.php?pg=1");
                    // }else if(preg_match('/[\^£$%&*()}{@#~><>|=_+¬-]/', $_POST['story_body']) || preg_match('/[0-9]/', $_POST['story_body'])) {
                    //     $session->message("News Body can not contain special symbols or number eg: 123456!@#");
                    //     redirect_to("../publicarea/index.php?pg=1");
                    // }else {
                        
                    // }
                }
            }
        }else if(isset($_POST['update_story'])) {
            if(isset($_POST['story_title']) && isset($_POST['story_body']) && isset($_POST['story_filename']) && isset($_POST['story_type']) && isset($_POST['story_size']) && isset($_POST['story_id']) && isset($_POST['story_status'])) {
                if(!empty($_POST['story_title']) && !empty($_POST['story_body']) && !empty($_POST['story_filename']) && !empty($_POST['story_type']) && !empty($_POST['story_size']) && !empty($_POST['story_id']) && !empty($_POST['story_status'])) {
                    global $DBInstance;
                    $publicStory = new Story();
                    $publicStory->id = $DBInstance->escapeValues($_POST['story_id']);
                    $publicStory->title = $DBInstance->escapeValues($_POST['story_title']);
                    $publicStory->body = $DBInstance->escapeValues($_POST['story_body']);
                    $publicStory->filename = $DBInstance->escapeValues($_POST['story_filename']);
                    $publicStory->type = $DBInstance->escapeValues($_POST['story_type']);
                    $publicStory->size = $DBInstance->escapeValues($_POST['story_size']);
                    $publicStory->status = $DBInstance->escapeValues($_POST['story_status']);
                    if($publicStory->saveDataToDatabase()) {
                        redirect_to("../publicarea/index.php?pg=1");
                    }
                }
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $publicStory = Story::getByID($_GET['id']);
            if($publicStory) {
                if ($publicStory->deletePublicStory()) {
                    redirect_to("../publicarea/index.php?pg=1");
                }
            }else {
                redirect_to("../publicarea/index.php?pg=1");
            }
        }else {
            redirect_to("../publicarea/index.php?pg=1");
        }
    }
?>