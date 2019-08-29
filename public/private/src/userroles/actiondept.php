<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    global $session;
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['add_department'])) {
            if(isset($_POST['department_title']) && isset($_POST['department_desc'])) {
                if(empty($_POST['department_title']) && empty($_POST['department_desc'])) {
                    $session->message("Please Insert Department Title and Description before submitting!");
                    redirect_to("../userroles/index.php?pg=1");
                }else if(!empty($_POST['department_title']) && empty($_POST['department_desc'])) {
                    $_SESSION['department_title'] = $DBInstance->escapeValues($_POST['department_title']);
                    $session->message("Please Insert Department Description before submitting!");
                    redirect_to("../userroles/index.php?pg=1");
                }else if(empty($_POST['department_title']) && !empty($_POST['department_desc'])) {
                    $_SESSION['department_desc'] = $DBInstance->escapeValues($_POST['department_desc']);
                    $session->message("Please Insert Department Title before submitting!");
                    redirect_to("../userroles/index.php?pg=1");
                }else if(!empty($_POST['department_title']) && !empty($_POST['department_desc'])) {
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['department_title']) || preg_match('/[0-9]/', $_POST['department_title'])) {
                        $session->message("Department Title can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../userroles/index.php?pg=1");
                    }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['department_desc']) || preg_match('/[0-9]/', $_POST['department_desc'])) {
                        $session->message("Department Description can not contain special symbols or number eg: 123456!@#");
                        redirect_to("../userroles/index.php?pg=1");
                    }else {
                        $_SESSION['department_title'] = $DBInstance->escapeValues($_POST['department_title']);
                        $_SESSION['department_desc'] = $DBInstance->escapeValues($_POST['department_desc']);
                        $department = new Department();

                        if (isset($_POST['department_id'])) {
                            $_SESSION['departmentID'] = $DBInstance->escapeValues($_POST['department_id']);
                            $id = $_SESSION['departmentID'];
                            $title = $_SESSION['department_title'];
                            $body = $_SESSION['department_desc'];
                            if($department->addDepartmentToInstanceVars($id, $title, $body)) {
                                if($department->addDepartmentToDB()) {
                                    unset($_SESSION['department_title']);
                                    unset($_SESSION['department_desc']);
                                    unset($_SESSION['departmentID']);
                                    redirect_to("../userroles/index.php?pg=1");
                                }else {
                                    redirect_to("../userroles/index.php?pg=1");
                                }
                            }
                                
                        }else {
                            if($department->isDataAssociatedWithExistInDB('name', $DBInstance->escapeValues($_POST['department_title']))) {
                                $session->message("Department ".$DBInstance->escapeValues($_POST['department_title'])." already exist.");
                                redirect_to("../userroles/index.php?pg=1");
                            }else {
                                $id = "";
                                $title = $_SESSION['department_title'];
                                $body = $_SESSION['department_desc'];
                                if($department->addDepartmentToInstanceVars($id, $title, $body)) {
                                    if($department->addDepartmentToDB()) {
                                        unset($_SESSION['department_title']);
                                        unset($_SESSION['department_desc']);
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
            $department = Department::getByID($_GET['id']);
            if($department) {
                if ($department->deleteDepartment()) {
                    redirect_to("../userroles/index.php?pg=1");
                }
            }else {
                $session->message("The Department could not be deleted.");
                redirect_to("../userroles/index.php?pg=1");
            }
        }else {
            $session->message("Error while deleting Department");
            redirect_to("../userroles/index.php?pg=1");
        }
    }
?>