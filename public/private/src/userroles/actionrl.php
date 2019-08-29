<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_role'])) {
            if(isset($_POST['role_title']) && isset($_POST['role_desc'])) {
                if(empty($_POST['role_title']) && empty($_POST['role_desc'])) {
                    $session->message("Please Insert User Role Title and Description before submitting!");
                    redirect_to("../userroles/index.php?pg=1");
                }else if(!empty($_POST['role_title']) && empty($_POST['role_desc'])) {
                    $_SESSION['role_title'] = $DBInstance->escapeValues($_POST['role_title']);
                    $session->message("Please Insert User Role Description before submitting!");
                    redirect_to("../userroles/index.php?pg=1");
                }else if(empty($_POST['role_title']) && !empty($_POST['role_desc'])) {
                    $_SESSION['role_desc'] = $DBInstance->escapeValues($_POST['role_desc']);
                    $session->message("Please Insert User Role Title before submitting!");
                    redirect_to("../userroles/index.php?pg=1");
                }else if(!empty($_POST['role_title']) && !empty($_POST['role_desc'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['role_title']) || preg_match('/[0-9]/', $_POST['role_title'])) {
                        $session->message("User Role Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../userroles/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['role_desc']) || preg_match('/[0-9]/', $_POST['role_desc'])) {
                        $session->message("User Role Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../userroles/index.php?pg=1");
                    }else {
                        $_SESSION['role_title'] = $DBInstance->escapeValues($_POST['role_title']);
                        $_SESSION['role_desc'] = $DBInstance->escapeValues($_POST['role_desc']);
                        $userRole = new Role();

                        if (isset($_POST['role_id'])) {
                            $_SESSION['roleID'] = $DBInstance->escapeValues($_POST['role_id']);
                            $id = $_SESSION['roleID'];
                            $title = $_SESSION['role_title'];
                            $body = $_SESSION['role_desc'];
                            if($userRole->addUserRolesToInstanceVars($id, $title, $body)) {
                                if($userRole->addUserRoleToDB()) {
                                    unset($_SESSION['role_title']);
                                    unset($_SESSION['role_desc']);
                                    unset($_SESSION['roleID']);
                                    redirect_to("../userroles/index.php?pg=1");
                                }else {
                                    redirect_to("../userroles/index.php?pg=1");
                                }
                            }
                                
                        }else {
                            if($userRole->isDataAssociatedWithExistInDB('name', $DBInstance->escapeValues($_POST['role_title']))) {
                                $session->message("User role ".$DBInstance->escapeValues($_POST['role_title'])." already exist.");
                                redirect_to("../userroles/index.php?pg=1");
                            }else {
                                $id = "";
                                $title = $_SESSION['role_title'];
                                $body = $_SESSION['role_desc'];
                                if($userRole->addUserRolesToInstanceVars($id, $title, $body)) {
                                    if($userRole->addUserRoleToDB()) {
                                        unset($_SESSION['role_title']);
                                        unset($_SESSION['role_desc']);
                                        redirect_to("../userroles/index.php?pg=1");
                                    }else {
                                        redirect_to("../userroles/index.php?pg=1");
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
            $userRole = Role::getByID($_GET['id']);
            if($userRole) {
                if ($userRole->deleteUserRole()) {
                    redirect_to("../userroles/index.php?pg=1");
                }
            }else {
                $session->message("The Role could not be deleted.");
                redirect_to("../userroles/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting User Role");
            redirect_to("../userroles/index.php?pg=1");
        }
    }
?>