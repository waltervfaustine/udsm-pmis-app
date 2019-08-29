<?php require_once("../../../../../../imports/autoload.php"); ?>

<?php
    global $session;
    if(isset($_POST['add_user_requirement'])) {
        if(isset($_POST['requirement_title']) && isset($_POST['requirement_desc']) && isset($_POST['requirement_id'])) {
            global $DBInstance;
            $requirementID = $DBInstance->escapeValues($_POST['requirement_id']);
            if(!empty($requirementID)) {
                $requirementID = $requirementID;
                $title = $DBInstance->escapeValues($_POST['requirement_title']);
                $body = $DBInstance->escapeValues($_POST['requirement_desc']);
                $userRequirement = new UserRequirement();
                if ($userRequirement->addRequirementInstanceVar($requirementID, $title, $body)) {
                    if(isset($_FILES['requirement_docfile'])) {
                        $requirementDocfile = $_FILES['requirement_docfile'];
                        if(is_document($requirementDocfile['tmp_name'])) {
                            if($userRequirement->attachRequirementPropsToInstanceVars($requirementDocfile)) {
                                if($userRequirement->saveUserRequirementToDB()) {
                                    $session->message("User Requirement is successfully added to the database");
                                    redirect_to("../../requirement/");
                                }else {
                                    $session->message("Error occuring while posting the User Requirement");
                                    redirect_to("../../requirement/");
                                }
                            }
                        }else {
                            $session->message("Please select an Document to upload");
                            redirect_to("../../requirement/");
                        }
                    }
                }else {
                    $session->message("Please fill all the necessary inputs for the User Requirement");
                    redirect_to("../../requirement/");
                }
            }else {
                $requirementID = $DBInstance->escapeValues($_POST['requirement_id']);
                $title = $DBInstance->escapeValues($_POST['requirement_title']);
                $body = $DBInstance->escapeValues($_POST['requirement_desc']);
                $userRequirement = new UserRequirement();
                if ($userRequirement->addRequirementInstanceVar($requirementID, $title, $body)) {
                    if(isset($_FILES['requirement_docfile'])) {
                        $requirementDocfile = $_FILES['requirement_docfile'];
                        if(is_document($requirementDocfile['tmp_name'])) {
                            if($userRequirement->attachRequirementPropsToInstanceVars($requirementDocfile)) {
                                if($userRequirement->saveUserRequirementToDB()) {
                                    $session->message("User Requirement is successfully added to the database");
                                    redirect_to("../../requirement/");
                                }else {
                                    $session->message("Error occuring while posting the User Requirement");
                                    redirect_to("../../requirement/");
                                }
                            }
                        }else {
                            $session->message("Please select an Document to upload");
                            redirect_to("../../requirement/");
                        }
                    }
                }else {
                    $session->message("Please fill all the necessary inputs for the User Requirement");
                    redirect_to("../../requirement/");
                }
            }
        }
    }
?>