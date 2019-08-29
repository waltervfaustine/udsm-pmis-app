<?php
    
    class Session {
        private $logged_in = false;
        public $user_id;
        public $role_id;
        public $message;

        function __construct() {
            session_start();
            $this->check_login();
            $this->check_message();

            if($this->logged_in){
                }else {
            }
        }

        public function is_logged_in() {
            return $this->logged_in;
        }

        public function login($user) {
            if($user) {
                if($user->role = 'Tenderer') {
                    $this->user_id = $_SESSION['user_id'] = $user->id;
                    $this->role_id = $_SESSION['role_id'] = $user->role_id;
                }
                $this->user_id = $_SESSION['user_id'] = $user->id;
                $this->role_id = $_SESSION['role_id'] = $user->role_id;
                $this->logged_in = true;
            }
        }

        public function logoutUser() {
            unset($_SESSION['user_id']);
            unset($_SESSION['role_id']);
            unset($_SESSION['login-email']);
            unset($_SESSION['login-fullname']);
            unset($_SESSION['passcode']);
            unset($_SESSION['role_id']);
            unset($this->user_id);
            unset($this->role_id);
            $this->logged_in = false;
            return true;
        }

        public function logoutStakeholder() {
            unset($_SESSION['stakeholder-fullname']);
            unset($_SESSION['stakeholder-status']);
            unset($_SESSION['stakeholder-uid']);
            unset($_SESSION['stakeholder-roleID']);
            unset($_SESSION['stk-message']);
            unset($_SESSION['role_id']);
            redirect_to("../../pubtend.php"); 
        }

        public function message($msg = "") {
            if(!empty($msg)) {
                $_SESSION['message'] = $msg;
                $this->message = $msg;
            }else {
                return $this->message;
            }
        }

        private function check_login() {
            if(isset($_SESSION['user_id']) && isset($_SESSION['role_id'])) {
                $this->user_id = $_SESSION['user_id'];
                $this->role_id = $_SESSION['role_id'];
                $this->logged_id = true;
            }else {
                unset($this->user_id);
                unset($this->role_id);
                $this->logged_in = false;
            }
        }

        public function check_message() {
            if(isset($_SESSION['message'])) {
                $this->message = $_SESSION['message'];
                unset($_SESSION['message']);
            }else {
                $this->message = "";
            }
        }
    }

    $session = new Session();
    $message = $session->message();

?>