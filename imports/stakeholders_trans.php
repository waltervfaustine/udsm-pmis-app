<?php
    require_once(LIB_PATH.DS."autoload.php");
    require_once(LIB_PATH.DS."dboperation.php");

    class StakeholderInfo extends DatabaseMANI{

        public static $table_name = 'stakeholders';
        public static $db_fields = array('id', 'fname', 'mname', 'lname', 'email', 'phone', 'gender', 'username', 'passcode', 'idcard_no', 'id_typeid', 'supply_id', 'status', 'token', 'prof_img', 'verification', 'role_id', 'name', 'description');

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
        public $name;
        public $description;
        
    }
?>