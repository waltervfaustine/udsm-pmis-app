<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class Department extends DatabaseMANI {

        public static $table_name = "departments";
        public static $db_fields = array('id', 'name', 'description');
        public $id;
        public $name;
        public $description;

        function __construct(){
           
        }

        public function addDepartmentToInstanceVars($id, $name, $desc) {
            if(!empty($name) && !empty($desc) && !empty($id)) {
                $this->id = $id;
                $this->name = $name;
                $this->description = $desc;
                return true;
            }else if(!empty($name) && !empty($desc) && empty($id)){
                $this->name = $name;
                $this->description = $desc;
                return true;
            }else {
                return false;
            }
        }

        public function addDepartmentToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("Department <strong>".$this->name."</strong> is successfully updated!");
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    unset($_SESSION['department_title']);
                    unset($_SESSION['department_desc']);
                    unset($_SESSION['department_id']);
                    $cont = true;
                    redirect_to("../userroles/index.php?pg=1");
                }
            }else {
                if ($this->create()) {
                    $session->message("Department <strong>".$this->name."</strong> is successfully created!");
                    unset($_SESSION['department_title']);
                    unset($_SESSION['department_desc']);
                    unset($_SESSION['department_id']);
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    redirect_to("../userroles/index.php?pg=1");
                    $cont = true;
                }
            }
            redirect_to("../userroles/index.php?pg=1");
            return $cont;
        }

        public function deleteDepartment() {
            global $session;
            if($this->delete()) {
                $session->message("Department <strong>".$this->name."</strong> is successfully deleted!");
                unset($_SESSION['department_title']);
                unset($_SESSION['department_desc']);
                unset($_SESSION['department_id']);
                unset($this->id);
                unset($this->name);
                unset($this->description);
                redirect_to("../userroles/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>".$this->name."<strong> Department!");
                redirect_to("../userroles/index.php?pg=1");
                return false;
            }
        }
    }
?>