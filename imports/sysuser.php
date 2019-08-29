<?php
    require_once(LIB_PATH.DS."autoload.php");
    require_once(LIB_PATH.DS."dboperation.php");

    class SystemUser extends DatabaseMANI{

        public static $table_name = 'systemusers';
        public static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'phone', 'gender', 'username', 'passcode', 'dept_id', 'role_id', 'status', 'token', 'user_desc', 'prof_img', 'createdby', 'timestamp');

        public $id;
        public $fname;
        public $mname;
        public $lname;
        public $email;
        public $phone;
        public $gender;
        public $username;
        public $passcode;
        public $dept_id;
        public $role_id;
        public $status;
        public $token;
        public $user_desc;
        public $prof_img;
        public $createdby;
        public $timestamp;

        public function addSystemUserInfoToInstanceVar($id, $fname, $mname, $lname, $email, $phone, $gender, $username, $passcode, $dept_id, $role_id, $status, $token, $user_desc, $prof_img, $createdby, $timestamp) {
            if(!empty($id) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($username) && !empty($passcode) && !empty($dept_id) && !empty($role_id) && !empty($status) && !empty($token) && !empty($user_desc) && !empty($prof_img)  && !empty($createdby) && !empty($timestamp)) {
                $this->id = $id;
                $this->fname = $fname;
                $this->mname = $mname;
                $this->lname = $lname;
                $this->email = $email;
                $this->phone = $phone;
                $this->gender = $gender;
                $this->username = $username;
                $this->passcode = $passcode;
                $this->dept_id = $dept_id;
                $this->role_id = $role_id;
                $this->status = $status;
                $this->status = $status;
                $this->token = $token;
                $this->user_desc = $user_desc;
                $this->prof_img = $prof_img;
                $this->createdby = $createdby;
                $this->timestamp = $timestamp;
                return true;
            }else if(empty($id) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($username) && !empty($passcode) && !empty($dept_id) && !empty($role_id) && !empty($status) && !empty($token) && !empty($user_desc) && !empty($prof_img)  && !empty($createdby) && !empty($timestamp)){
                $this->fname = $fname;
                $this->mname = $mname;
                $this->lname = $lname;
                $this->email = $email;
                $this->phone = $phone;
                $this->gender = $gender;
                $this->username = $username;
                $this->passcode = $passcode;
                $this->dept_id = $dept_id;
                $this->role_id = $role_id;
                $this->status = $status;
                $this->status = $status;
                $this->token = $token;
                $this->user_desc = $user_desc;
                $this->prof_img = $prof_img;
                $this->createdby = $createdby;
                $this->timestamp = $timestamp;
                return true;
            }
        }

        public static function authenticate($email){
            global $DBInstance;
            $table_name = "systemusers";
            $email = $DBInstance->escapeValues($email);

            $sql = "SELECT * FROM systemusers";
            $sql .= " WHERE email = '{$email}'";
            $sql .= "LIMIT 1";

            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }

        public function addSystemUserInfoToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $roles = Role::getByID($this->role_id);
                    registerLogAction("Update Info", "$roles->name", $this->phone, $this->email, "Successfully", $this->gender, "$this->fname $this->mname $this->lname");
                    $session->message("User <strong>".$this->fname."</strong> is successfully updated!");
                    return true;
                }else {
                    $session->message("Nothing Has been updated");
                    redirect_to("./index.php?pg=1");
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

        public function unsetInstanceVars() {
            unset($this->id);
            unset($this->fname);
            unset($this->mname);
            unset($this->lname);
            unset($this->email);
            unset($this->phone);
            unset($this->gender);
            unset($this->username);
            unset($this->passcode);
            unset($this->dept_id);
            unset($this->role_id);
            unset($this->status);
            unset($this->token);
            unset($this->user_desc);
            unset($this->prof_img);
            unset($this->createdby);
            unset($this->timestamp);
            return true;
        }

        public function unsetInstanceAndSessionVars() {
            unset($_SESSION['su_firstname']);
            unset($_SESSION['su_middlename']);
            unset($_SESSION['su_lastname']);
            unset($_SESSION['su_email']);
            unset($_SESSION['su_phonenumber']);
            unset($_SESSION['su_username']);
            unset($_SESSION['su_desc']);
            unset($_SESSION['su_password']);
            unset($_SESSION['su_gender_id']);
            unset($_SESSION['su_dept_id']);
            unset($_SESSION['su_role_id']);
            unset($_SESSION['su_status']);
            unset($_SESSION['su_token']);
            unset($_SESSION['su_prof_img']);
            unset($_SESSION['su_createdby']);
            unset($_SESSION['su_timestamp']);
            unset($this->id);
            unset($this->fname);
            unset($this->mname);
            unset($this->lname);
            unset($this->email);
            unset($this->phone);
            unset($this->gender);
            unset($this->username);
            unset($this->passcode);
            unset($this->dept_id);
            unset($this->role_id);
            unset($this->status);
            unset($this->token);
            unset($this->user_desc);
            unset($this->prof_img);
            unset($this->createdby);
            unset($this->timestamp);
            return true;
        }

        public function deleteSystemUser() {
            global $session;
            if($this->delete()) {
                $session->message("User <strong>".$this->fname."</strong> is successfully deleted!");
                redirect_to("./index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>".$this->fname."<strong>!");
                redirect_to("./index.php?pg=1");
                return false;
            }
        }

        public function fullname($fname, $mname, $lname){
            if(!empty($fname) && empty($mname) && !empty($mname)){
                return $fname. " " .$mname.". ".$lname;
            }else {
                return "No name to display";
            }
        }
    }
?>