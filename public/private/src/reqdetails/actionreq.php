<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['update_user_requirement'])) {
            if(isset($_POST['requirement_title']) && isset($_POST['requirement_body']) && isset($_POST['user_requirement_filename']) && isset($_POST['user_requirement_type']) && isset($_POST['user_requirement_size']) && isset($_POST['requirement_id']) && isset($_POST['user_requirement_status']) && isset($_POST['user_requirement_requesterid']) && isset($_POST['user_requirement_timestamp'])) {
                if(!empty($_POST['requirement_title']) && !empty($_POST['requirement_body']) && !empty($_POST['user_requirement_filename']) && !empty($_POST['user_requirement_type']) && !empty($_POST['user_requirement_size']) && !empty($_POST['requirement_id']) && !empty($_POST['user_requirement_status']) && !empty($_POST['user_requirement_requesterid']) && !empty($_POST['user_requirement_timestamp'])) {
                    global $DBInstance;
                    $userRequirement = new UserRequirement();
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_title']) || preg_match('/[0-9]/', $_POST['requirement_title'])) {
                        $session->message("User Requirement Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../reqdetails/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_body']) || preg_match('/[0-9]/', $_POST['requirement_body'])) {
                        $session->message("Requirement Requirement Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../reqdetails/index.php?pg=1");
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
                            redirect_to("../../reqdetails/index.php?pg=1");
                        }else {
                            redirect_to("../../reqdetails/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Some field are empty");
                    echo $_POST['requirement_title'];
                    echo $_POST['requirement_body'];
                    echo $_POST['user_requirement_filename'];
                    echo $_POST['user_requirement_type'];
                    echo $_POST['user_requirement_size'];
                    echo $_POST['requirement_id'];
                    echo $_POST['user_requirement_status'];
                    echo $_POST['user_requirement_requesterid'];
                    redirect_to("../../reqdetails/index.php?pg=1");
                }
            }else {
                $session->message("Some field are not set");
                redirect_to("../../reqdetails/index.php?pg=1");
            }
        }else if(isset($_POST['approval_user_requirement'])) {
            if(isset($_POST['user_requirement_approval_status']) && isset($_POST['requirement_id'])) {
                if(!empty($_POST['user_requirement_approval_status']) && !empty($_POST['requirement_id'])) {
                    global $DBInstance;
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['user_requirement_approval_status'])) {
                        $session->message("Requirement approval status cannot contains numbers or special symbols eg: 123456!@#");
                        redirect_to("../../reqdetails/index.php?pg=1");
                    }else {
                        $requirement_id = $DBInstance->escapeValues($_POST['requirement_id']);
                        $user_requirement_approval_status = $DBInstance->escapeValues($_POST['user_requirement_approval_status']);
                        $stakeholder_colname = 'status';
                        
                        if(UserRequirement::updateDataToDatabase($requirement_id, $stakeholder_colname, $user_requirement_approval_status)) {
                            $session->message("Requirement status is successfully changed");
                            redirect_to("../../reqdetails/index.php?pg=1");
                        }else {
                            $session->message("Requirement status failed to be changed");
                            redirect_to("../../reqdetails/index.php?pg=1");
                        }
                    }
                }else {
                    $session->message("Necessary details are not empty");
                    redirect_to("../../reqdetails/index.php?pg=1");
                }
            }else {
                $session->message("Necessary details are not set");
                redirect_to("../../reqdetails/index.php?pg=1");
            }
        }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!empty($_GET['id'])) {
            $userRequirement = UserRequirement::getByID($_GET['id']);
            if($userRequirement) {
                if ($userRequirement->deleteUserRequirement()) {
                    redirect_to("../reqdetails/index.php?pg=1");
                }
            }else {
                redirect_to("../reqdetails/index.php?pg=1");
            }
        }else {
            redirect_to("../reqdetails/index.php?pg=1");
        }
    }
?>