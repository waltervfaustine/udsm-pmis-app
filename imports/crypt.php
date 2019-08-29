<?php
    require_once(LIB_PATH.DS."autoload.php");

    class CainamCrypt {
        public static $encypted_password;
        public $stored_hash;

        public static function Encrypt($passcode) {
            $ghost = md5(uniqid(mt_rand(), true));
            $hash_format = "$2y$100$";
            $format_and_ghost = Crypt::format_and_ghost($hash_format, $ghost);
            return crypt($passcode, $format_and_ghost);
        }

        private static function format_and_ghost($hash_format, $ghost) {
            return $hash_format.$ghost;
        }

        public static function authenticate($passcode, $stored_hash) {
            return crypt($passcode, $stored_hash) === $stored_hash;
        }

        
        private function stored_hash($stored_hash) {
            return Crypt::$stored_hash;
        }


        public static function hashing($passcode) {
            $options = [
                'cost' => 12,
            ];
            return password_hash($passcode, PASSWORD_BCRYPT, $options);
        }

        public static function quin($password, $hash) {
            return password_verify($password, $hash);   
        }
    }
?>
