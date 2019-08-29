<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class Role extends DatabaseMANI {

        public static $table_name = "roles";
        public static $db_fields = array('id', 'name', 'description');
        public static $expected_roleid;
        public $id;
        public $name;
        public $description;

        function __construct(){
           
        }

        public static function getRole($role_id){
            global $DBInstance;
            $table_name = "roles";
            $roleID = $DBInstance->escapeValues($role_id);

            $sql = "SELECT * FROM roles";
            $sql .= " WHERE id = '{$roleID}'";
            $sql .= "LIMIT 1";

            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }


        public function addUserRolesToInstanceVars($id, $name, $desc) {
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

        public function addUserRoleToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    unset($_SESSION['role_title']);
                    unset($_SESSION['role_desc']);
                    unset($_SESSION['roleID']);
                    $session->message("Role <strong>".$this->name."</strong> is successfully updated!");
                    $cont = true;
                    redirect_to("../userroles/index.php?pg=1");
                }
            }else {
                if ($this->create()) {
                    unset($_SESSION['role_title']);
                    unset($_SESSION['role_desc']);
                    unset($_SESSION['roleID']);
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    $session->message("Role <strong>".$this->name."</strong> is successfully created!");
                    redirect_to("../userroles/index.php?pg=1");
                    $cont = true;
                }
            }
            redirect_to("../userroles/index.php?pg=1");
            return $cont;
        }

        public static function setExpectedRoleID($id) {
            self::$expected_roleid = $id;
        }

        public static function getExpectedRoleID() {
            return self::$expected_roleid;
        }

        public function deleteUserRole() {
            global $session;
            if($this->delete()) {
                unset($_SESSION['role_title']);
                unset($_SESSION['role_desc']);
                unset($_SESSION['roleID']);
                unset($this->id);
                unset($this->name);
                unset($this->description);
                $session->message("Role <strong>{".$this->name."}</strong> is successfully deleted!");
                redirect_to("../userroles/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>{".$this->name."}<strong> user role!");
                redirect_to("../userroles/index.php?pg=1");
                return false;
            }
        }
    }


    $systemrole = new Role();
?>