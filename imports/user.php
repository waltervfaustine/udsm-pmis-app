<?php
    require_once(LIB_PATH.DS."autoload.php");
    require_once(LIB_PATH.DS."dboperation.php");

    class User extends DatabaseMANI{

        protected static $table_name = 'users';
        // protected static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'passcode', 'city', 'role_id', 'phone', 'username', 'user_desc');
        // protected static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'passcode', 'city', 'role_id', 'phone', 'username', 'user_desc', 'token', 'status', 'name', 'description');
        protected static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'passcode', 'city', 'role_id', 'phone', 'username', 'user_desc', 'token', 'status');
        public static $currentUSER;

        public $id;
        public $fname;
        public $lname;
        public $mname;
        public $email;
        public $passcode;
        public $city;
        public $role_id;
        public $phone;
        public $username;
        public $user_desc;
        public $token;
        public $status;

        public static function authenticate1($email="", $passcode="", $role_id=""){
            global $DBInstance;
            $table_name = "users";
            $email = $DBInstance->escapeValues($email);
            $passcode = $DBInstance->escapeValues($passcode);
            $role_id = $DBInstance->escapeValues($role_id);

            // $sql = "SELECT * FROM users";
            // $sql .= " WHERE email = '{$email}'";
            // $sql .= " AND passcode = '{$passcode}' ";
            // $sql .= "LIMIT 1";

            $sql = "SELECT $table_name.id, ";
            $sql .= "$table_name.fname, ";
            $sql .= "$table_name.mname, ";
            $sql .= "$table_name.lname, ";
            $sql .= "$table_name.email, ";
            $sql .= "$table_name.passcode, ";
            $sql .= "$table_name.city, ";
            $sql .= "$table_name.role_id, ";
            $sql .= "$table_name.token, ";
            $sql .= "$table_name.status, ";
            $sql .= "$table_name.user_desc, ";
            $sql .= "roles.name, ";
            $sql .= "roles.description ";
            $sql .= "FROM users INNER JOIN roles ON ";
            $sql .= "$table_name.role_id = '{$role_id}' AND ";
            $sql .= "$table_name.email = '{$email}' AND ";
            $sql .= "$table_name.passcode = '{$passcode}'";


            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }

        public static function authenticate($email="", $passcode=""){
            global $DBInstance;
            $table_name = "users";
            $email = $DBInstance->escapeValues($email);
            $passcode = $DBInstance->escapeValues($passcode);
            // $role_id = $DBInstance->escapeValues($role_id);

            $sql = "SELECT * FROM users";
            $sql .= " WHERE email = '{$email}'";
            $sql .= " AND passcode = '{$passcode}' ";
            $sql .= "LIMIT 1";

            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }

        // public static function getUserRole($role_id){
        //     global $DBInstance;
        //     $table_name = "roles";
        //     $roleID = $DBInstance->escapeValues($role_id);

        //     $sql = "SELECT * FROM roles";
        //     $sql .= " WHERE id = '{$roleID}'";
        //     $sql .= "LIMIT 1";

        //     $result_array = self::getBySQL($sql);
        //     return !empty($result_array) ? array_shift($result_array) : false;
        // }

        public function addUserInfoToInstanceVar($id, $firstname, $middlename, $lastname, $username, $email, $password, $phonecall, $user_desc) {
            if(!empty($id) && !empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($phonecall) && !empty($user_desc)) {
                $this->role_id = $id;
                $this->fname = $firstname;
                $this->mname = $middlename;
                $this->lname = $lastname;
                $this->phone = $phonecall;
                $this->email = $email;
                $this->username = $username;
                $this->passcode = $password;
                $this->user_desc = $user_desc;
                return true;
            }else if(empty($id) && !empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($phonecall) && !empty($user_desc)){
                $this->fname = $firstname;
                $this->mname = $middlename;
                $this->lname = $lastname;
                $this->phone = $phonecall;
                $this->email = $password;
                $this->username = $username;
                $this->email = $email;
                $this->passcode = $password;
                $this->user_desc = $user_desc;
                return true;
            }else {
                return false;
            }
            
        }

        public function addSystemUserToDB() {
            global $session;
            if(isset($this->id)) {
                $this->update();

                // if ($this->update()) {
                //     $session->message("Role <strong>".$this->name."</strong> is successfully updated!");
                //     $cont = true;
                // }
            }else {
                $this->create();

                // if ($this->create()) {
                //     $session->message("Role <strong>".$this->name."</strong> is successfully created!");
                //     $cont = true;
                // }
            }
            redirect_to("../../user/");
            return $cont;
        }

        public function fullname($fname, $mname, $lname){
            if(!empty($fname) && empty($mname) && !empty($mname)){
                return $fname. " " .$mname.". ".$lname;
            }else {
                return "";
            }
        }
    }

    $systemuser = new User();
?>