<?php
    require_once(LIB_PATH.DS."autoload.php");
    require_once(LIB_PATH.DS."dboperation.php");

    class Stakeholder extends DatabaseMANI{

        public static $table_name = 'stakeholders';
        public static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'phone', 'gender', 'username', 'passcode', 'idcard_no', 'id_typeid', 'supply_id', 'status', 'token', 'prof_img', 'verification', 'role_id', 'timestamp');

        public $id;
        public $fname;
        public $mname;
        public $lname;
        public $email;
        public $phone;
        public $gender;
        public $username;
        public $passcode;
        public $idcard_no;
        public $id_typeid;
        public $supply_id;
        public $status;
        public $token;
        public $prof_img;
        public $verification;
        public $role_id;
        public $timestamp;

        public function addStakeholderInfoToInstanceVar($id, $fname, $mname, $lname, $email, $phone, $gender, $username, $passcode, $idcard_no, $id_typeid, $supply_id, $status, $token, $prof_img, $verification, $role_id, $timestamp) {
            if(!empty($id) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($username) && !empty($passcode) && !empty($idcard_no) && !empty($id_typeid) && !empty($supply_id) && !empty($status) && !empty($token) && !empty($prof_img) && !empty($verification) && !empty($role_id)  && !empty($timestamp)) {
                $this->id = $id;
                $this->fname = $fname;
                $this->mname = $mname;
                $this->lname = $lname;
                $this->email = $email;
                $this->phone = $phone;
                $this->gender = $gender;
                $this->username = $username;
                $this->passcode = $passcode;
                $this->idcard_no = $idcard_no;
                $this->id_typeid = $id_typeid;
                $this->supply_id = $supply_id;
                $this->status = $status;
                $this->token = $token;
                $this->prof_img = $prof_img;
                $this->verification = $verification;
                $this->role_id = $role_id;
                $this->timestamp = $timestamp;
                return true;
            }else if(empty($id) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($username) && !empty($passcode) && !empty($idcard_no) && !empty($id_typeid) && !empty($supply_id) && !empty($status) && !empty($token) && !empty($prof_img) && !empty($verification) && !empty($role_id) && !empty($timestamp)){
                $this->fname = $fname;
                $this->mname = $mname;
                $this->lname = $lname;
                $this->email = $email;
                $this->phone = $phone;
                $this->gender = $gender;
                $this->username = $username;
                $this->passcode = $passcode;
                $this->idcard_no = $idcard_no;
                $this->id_typeid = $id_typeid;
                $this->supply_id = $supply_id;
                $this->status = $status;
                $this->token = $token;
                $this->prof_img = $prof_img;
                $this->verification = $verification;
                $this->role_id = $role_id;
                $this->timestamp = $timestamp;
                return true;
            }
        }

        public function addStakeholderInfoToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("User <strong>".$this->fname."</strong> is successfully updated!");
                    $roles = Role::getByID($this->role_id);
                    registerLogAction("Update Info", "$roles->name", $this->phone, $this->email, "Successfully", $this->gender, "$this->fname $this->mname $this->lname");
                    return true;
                }
            }else {
                if ($this->create()) {
                    $roles = Role::getByID($this->role_id);
                    registerLogAction("Registration", "$roles->name", $this->phone, $this->email, "Successfully", $this->gender, "$this->fname $this->mname $this->lname");
                    $session->message("User <strong>".$this->fname."</strong> is successfully created!");
                    return true;
                }
            }
        }

        public function unsetInstanceAndSessionVars() {
            unset($_SESSION['tbreg_category']);
            unset($_SESSION['tbcreg_firstname']);
            unset($_SESSION['tbcreg_middlename']);
            unset($_SESSION['tbcreg_lastname']);
            unset($_SESSION['tbcreg_email']);
            unset($_SESSION['tbcreg_phonecall']);
            unset($_SESSION['tbcreg_gender']);
            unset($_SESSION['tbcreg_username']);
            unset($_SESSION['tbcreg_passcode']);
            unset($_SESSION['tbcreg_idcard']);
            unset($_SESSION['tbcreg_idcard_type']);
            unset($_SESSION['tbcreg_status']);
            unset($_SESSION['tbcreg_token']);
            unset($_SESSION['tbcreg_prof_img']);
            unset($_SESSION['tbcreg_verification']);
            unset($_SESSION['tbcreg_timestamp']);
        //     unset($this->id);
        //     unset($this->fname);
        //     unset($this->mname);
        //     unset($this->lname);
        //     unset($this->email);
        //     unset($this->phone);
        //     unset($this->gender);
        //     unset($this->username);
        //     unset($this->passcode);
        //     unset($this->idcard_no);
        //     unset($this->id_typeid);
        //     unset($this->supply_id);
        //     unset($this->status);
        //     unset($this->$prof_img);
        //     unset($this->$verification);
        //     unset($this->$role_id);
            return true;
        }

        public function deleteStakeholder() {
            global $session;
            if($this->delete()) {
                $session->message("User <strong>{".$this->name."}</strong> is successfully deleted!");
                redirect_to("../tenderreg.php");
                return true;
            }else {
                $session->message("Failed to delete <strong>{".$this->name."}<strong>!");
                redirect_to("../tenderreg.php");
                return false;
            }
        }

        public function fullName($fname, $mname, $lname) {
            return $fname." ".$mname." ".$lname;
        }


        public static function authenticate($email){
            global $DBInstance;
            $table_name = "stakeholders";
            $email = $DBInstance->escapeValues($email);

            $sql = "SELECT * FROM stakeholders";
            $sql .= " WHERE email = '$email'";
            $sql .= " LIMIT 1";

            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    }
?>