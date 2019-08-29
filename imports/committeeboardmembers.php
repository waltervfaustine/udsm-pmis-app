<?php
    require_once(LIB_PATH.DS."autoload.php");
    require_once(LIB_PATH.DS."dboperation.php");

    class CommitteeBoardMembers extends DatabaseMANI{

        public static $table_name = 'committee_board_members';
        public static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'phone', 'gender', 'passcode', 'role_name', 'profile', 'designated_id', 'timestamp', 'addedby_id');

        public $id;
        public $fname;
        public $mname;
        public $lname;
        public $email;
        public $phone;
        public $gender;
        public $passcode;
        public $role_name;
        public $profile;
        public $designated_id;
        public $timestamp;
        public $addedby_id;

        public function addCommitteeBoardInstanceVar($id, $fname, $mname, $lname, $email, $phone, $gender, $passcode, $role_name, $profile, $designated_id, $timestamp, $addedby_id) {
            if(!empty($id) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($passcode) && !empty($role_name) && !empty($profile) && !empty($designated_id) && !empty($timestamp) && !empty($addedby_id)) {
                $this->id = $id;
                $this->fname = $fname;
                $this->mname = $mname;
                $this->lname = $lname;
                $this->email = $email;
                $this->phone = $phone;
                $this->gender = $gender;
                $this->passcode = $passcode;
                $this->role_name = $role_name;
                $this->profile = $profile;
                $this->designated_id = $designated_id;
                $this->timestamp = $timestamp;
                $this->addedby_id = $addedby_id;
                return true;
            }else if(empty($id) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($passcode) && !empty($role_name) && !empty($profile) && !empty($designated_id) && !empty($timestamp) && !empty($addedby_id)){
                $this->fname = $fname;
                $this->mname = $mname;
                $this->lname = $lname;
                $this->email = $email;
                $this->phone = $phone;
                $this->gender = $gender;
                $this->passcode = $passcode;
                $this->role_name = $role_name;
                $this->profile = $profile;
                $this->designated_id = $designated_id;
                $this->timestamp = $timestamp;
                $this->addedby_id = $addedby_id;
                return true;
            }
        }

        public function addCommitteeBoardMembersInfoToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("Members <strong>".$this->fname."</strong> is successfully updated!");
                    return true;
                }
            }else {
                if ($this->create()) {
                    $session->message("Members <strong>".$this->fname."</strong> is successfully created!");
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
            unset($this->passcode);
            unset($this->role_name);
            unset($this->profile);
            unset($this->designated_id);
            unset($this->timestamp);
            unset($this->addedby_id);
            return true;
        }

        public function unsetInstanceAndSessionVars() {
            unset($_SESSION['memb_fname']);
            unset($_SESSION['memb_mname']);
            unset($_SESSION['memb_lname']);
            unset($_SESSION['memb_gender_id']);
            unset($_SESSION['memb_email']);
            unset($_SESSION['memb_phone']);
            unset($_SESSION['memb_prof']);
            unset($_SESSION['memb_role']);
            unset($_SESSION['su_role_name']);
            unset($_SESSION['su_profile']);
            unset($this->id);
            unset($this->fname);
            unset($this->mname);
            unset($this->lname);
            unset($this->email);
            unset($this->phone);
            unset($this->gender);
            unset($this->passcode);
            unset($this->role_name);
            unset($this->profile);
            unset($this->designated_id);
            unset($this->timestamp);
            unset($this->addedby_id);
            return true;
        }

        public function deleteMembers() {
            global $session;
            if($this->delete()) {
                $session->message("Members <strong>".$this->fname."</strong> is successfully deleted!");
                redirect_to("./index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>".$this->fname."<strong>!");
                redirect_to("./index.php?pg=1");
                return false;
            }
        }

        public function fullName($fname, $mname, $lname) {
            return $fname." ".$mname." ".$lname;
        }
    }
?>