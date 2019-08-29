<?php
    if(isset($_POST['update_tender'])) {
        if(isset($_POST['pretender_title']) && isset($_POST['requirement_body']) && isset($_POST['user_requirement_filename']) && isset($_POST['user_requirement_type']) && isset($_POST['user_requirement_size']) && isset($_POST['requirement_id']) && isset($_POST['user_requirement_status']) && isset($_POST['user_requirement_requesterid']) && isset($_POST['user_requirement_timestamp'])) {
            if(!empty($_POST['pretender_title']) && !empty($_POST['requirement_body']) && !empty($_POST['user_requirement_filename']) && !empty($_POST['user_requirement_type']) && !empty($_POST['user_requirement_size']) && !empty($_POST['requirement_id']) && !empty($_POST['user_requirement_status']) && !empty($_POST['user_requirement_requesterid']) && !empty($_POST['user_requirement_timestamp'])) {
                global $DBInstance;
                $userRequirement = new TenderPosting();
                if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['pretender_title']) || preg_match('/[0-9]/', $_POST['pretender_title'])) {
                    $session->message("User Requirement Title can not contain special symbols or number eg: 123456!@#");
                    redirect_to("../preptender/index.php?pg=1");
                }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['requirement_body']) || preg_match('/[0-9]/', $_POST['requirement_body'])) {
                    $session->message("Requirement Requirement Description can not contain special symbols or number eg: 123456!@#");
                    redirect_to("../preptender/index.php?pg=1");
                }else {
                    $userRequirement->id = $DBInstance->escapeValues($_POST['requirement_id']);
                    $userRequirement->title = $DBInstance->escapeValues($_POST['pretender_title']);
                    $userRequirement->body = $DBInstance->escapeValues($_POST['requirement_body']);
                    $userRequirement->filename = $DBInstance->escapeValues($_POST['user_requirement_filename']);
                    $userRequirement->type = $DBInstance->escapeValues($_POST['user_requirement_type']);
                    $userRequirement->size = $DBInstance->escapeValues($_POST['user_requirement_size']);
                    $userRequirement->status = $DBInstance->escapeValues($_POST['user_requirement_status']);
                    $userRequirement->requesterid = $DBInstance->escapeValues($_POST['user_requirement_requesterid']);
                    $userRequirement->timestamp = strtotime($DBInstance->escapeValues($_POST['user_requirement_timestamp']));
                    if($userRequirement->saveDataToDatabase()) {
                        redirect_to("../../preptender/index.php?pg=1");
                    }else {
                        redirect_to("../../preptender/index.php?pg=1");
                    }
                }
            }else {
                $session->message("Some field are empty");
                redirect_to("../../preptender/index.php?pg=1");
            }
        }else {
            $session->message("Some field are not set");
            redirect_to("../../preptender/index.php?pg=1");
        }
    }
?>