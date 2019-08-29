<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once(LIB_PATH.DS."dboperation.php");
    require_once(LIB_PATH.DS."autoload.php");
    require_once(LIB_PATH.DS."PHPMailer".DS."src".DS."Exception.php");
    require_once(LIB_PATH.DS."PHPMailer".DS."src".DS."PHPMailer.php");
    require_once(LIB_PATH.DS."PHPMailer".DS."src".DS."SMTP.php");
    require_once(LIB_PATH.DS."PHPMailer".DS."src".DS."SMTP.php");

    class DatabaseMANI {
        protected static $table_name = "";
        protected static $db_fields = array();

        function __construct() {
            
        }

        /* 
        |************************************************
        |           START: PAGINATION IMPLEMENTATION
        |------------------------------------------------
        |   How to control the record of data in table
        |________________________________________________
        */

        public function getFirstAndLastname($fname, $lname) {
            return $fname." ".$lname;
        }

        public function computeTime($time) {
            $timediff = time() - $time;   
            
            if ($timediff < 1){
                return '0 seconds';
            }

            $timemessages = array( 
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
            );

            foreach ($timemessages as $timemessage => $str){
                $d = $timediff / $timemessage;
                if ($d >= 1){
                    $r = round($d);
                    return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
                }
            }
        }

        public static function getPage($page) {
            global $DBInstance;
            $returned = !empty($page) ? (int)$page : 1;
            return $returned;
        }

        public static function getRecordPerPage() {
            $recordperpage = 5;
            return $recordperpage;
        }

        public static function getRecordForPublicPage() {
            $recordperpage = 10;
            return $recordperpage;
        }

        public function findRecordsForThisPage($per_page, $offset) {
            global $DBInstance; 
            $sql = "SELECT * FROM ".static::$table_name." ORDER BY id DESC ";
            $sql .= "LIMIT {$DBInstance->escapeValues($per_page)} ";
            $sql .= "OFFSET {$DBInstance->escapeValues($offset)}";
            return $sql;
        }

        /* 
        |************************************************
        |           ENDS: PAGINATION IMPLEMENTATION
        |------------------------------------------------
        |   How to control the record of data in table
        |________________________________________________
        */

        public static function getAll() {
            global $DBInstance; 
            return static::getBySQL("SELECT * FROM ".static::$table_name);
        }

        public static function getByID($id = 0) {
            global $DBInstance;
            $result_array = static::getBySQL("SELECT * FROM ".static::$table_name." WHERE id = ".$DBInstance->escapeValues($id)." LIMIT 1");
            if(!empty($result_array)) {
                return array_shift($result_array);
            }
        }

        public function stakeholdersRegistrationVerificationEmail() {
            $message = "Hello $this->fname, \n\n";
            $message .= "Confirmation link has been sent to your email $this->email ";
            $message .= "Please verify your account by clicking on the link below! \n";
            // $web_address = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
            $message .= "http://localhost/pmis/public/op/accverific.php?username=$this->username&token=$this->token\n\n";
            $message .= "Regards\n";
            $message .= "UDSM Procurement PMIS 2018.\n";
            return $message;
        }

        public function sendEmailToStakeholder() {
            $message = "Hello $this->fname, \n\n";
            $message .= "Confirmation link has been sent to your email $this->email ";
            $message .= "Please verify your account by clicking on the link below! \n";
            // $web_address = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
            $message .= "http://localhost/pmis/public/op/accverific.php?username=$this->username&token=$this->token\n\n";
            $message .= "Regards\n";
            $message .= "UDSM Procurement PMIS 2018.\n";
            return $message;
        }

        public function sendEmailToStakeholderTenderNotification() {
            $message = "Hello, \n\n";
            $message .= "Please Visit UDSM For More Information about the tenders \n";
            // $web_address = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
            $message .= "http://localhost/pmis/public/index.php\n\n";
            $message .= "Regards\n";
            $message .= "UDSM Procurement PMIS 2018.\n";
            return $message;
        }

         public function sendEmailStakeholdersCategory($subject, $message, $emails) {
            $mail = new PHPMailer(true);
            if(!empty($subject) && !empty($message)) {
                try {
                    $mail->SMTPDebug = 2;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = false;
                    $mail->Username = 'fypis3352018@gmail.com';
                    $mail->Password = 'finalyearproject2018';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->isHTML(false);
                    $mail->setFrom('fypis3352018@gmail.com', 'UDSM Procurement MIS');
                    $mail->addAddress(implode(', ', $emails));
                    $mail->Subject = $subject;
                    $mail->Body    = $message;

                    if ($mail->send()) {
                        return true;
                    }else {
                        return true;
                    }
                }catch(Exception $e) {
                    echo $e;
                }
            }
        }

        public function sendStakeholderEmail($subject, $message, $emails) {
            $mail = new PHPMailer(true);
            if(!empty($subject) && !empty($message)) {
                try {
                    $mail->SMTPDebug = 2;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = false;
                    $mail->Username = 'fypis3352018@gmail.com';
                    $mail->Password = 'finalyearproject2018';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->isHTML(false);
                    $mail->setFrom('fypis3352018@gmail.com', 'UDSM Procurement MIS');
                    $mail->addAddress($emails, $this->fname." ".$this->lname);
                    $mail->Subject = $subject;
                    $mail->Body    = $message;

                    if ($mail->send()) {
                        return true;
                    }else {
                        return true;
                    }
                }catch(Exception $e) {
                    echo $e;
                }
            }
        }

        public function systemUserRegistrationVerificationEmail() {
            $message = "Hello $this->fname, \n\n";
            $message .= "Confirmation link has been sent to your email $this->email ";
            $message .= "Please verify your account by clicking on the link below! \n";
            // $web_address = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
            $message .= "http://localhost/pmis/public/private/auth/op/newpass.php?email=$this->email&token=$this->token\n\n";
            $message .= "Regards\n";
            $message .= "UDSM Procurement PMIS 2018.\n";
            return $message;
        }
        
        public function verificationMessage() {
            $message = "Hello $this->fname, \n\n";
            $message .= "Confirmation link has been sent to your email $this->email ";
            $message .= "Please verify your account by clicking on the link below! \n";
            $message .= "http://localhost/pmis/public/op/accverific.php?username=$this->username&token=$this->token\n\n";
            $message .= "Regards\n";
            $message .= "UDSM Procurement PMIS 2018.\n";
            return $message;
        }

        public function passwordRecoveryMessage($fname, $email, $token) {
            if(!empty($fname) && !empty($email) && !empty($token)) {
                $message = "Hello $fname\n\n";
                $message .= "Password link has been sent to $email ";
                $message .= "Please click the link below to recover/change your password \n";
                $message .= "http://localhost/pmis/public/op/newpass.php?email=$email&token=$token\n\n";
                $message .= "Regards\n";
                $message .= "UDSM Procurement PMIS 2018.\n";
                return $message;
            }
        }

        public function userPasswordRecoveryMessage($fname, $email, $token) {
            if(!empty($fname) && !empty($email) && !empty($token)) {
                $message = "Hello $fname\n\n";
                $message .= "Password link has been sent to $email ";
                $message .= "Please click the link below to recover/change your password \n";
                $message .= "http://localhost/pmis/public/private/auth/op/newpass.php?email=$email&token=$token\n\n";
                $message .= "Regards\n";
                $message .= "UDSM Procurement PMIS 2018.\n";
                return $message;
            }
        }

        public function sendEmail($subject, $message) {
            $mail = new PHPMailer(true);
            if(!empty($subject) && !empty($message)) {
                try {
                    $mail->SMTPDebug = 2;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = false;
                    $mail->Username = 'fypis3352018@gmail.com';
                    $mail->Password = 'finalyearproject2018';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->isHTML(false);
                    $mail->setFrom('fypis3352018@gmail.com', 'UDSM Procurement MIS');
                    $mail->addAddress($this->email, $this->fname." ".$this->lname);
                    $mail->Subject = $subject;
                    $mail->Body    = $message;

                    if ($mail->send()) {
                        return true;
                    }else {
                        return true;
                    }
                }catch(Exception $e) {
                    echo $e;
                }
            }
        }

       

        public function sendRecoveryEmail($email, $fullname, $subject, $message) {
            $flag;
            $mail = new PHPMailer(true);
            if(!empty($subject) && !empty($message)) {
                try {
                    $mail->SMTPDebug = 2;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = false;
                    $mail->Username = 'fypis3352018@gmail.com';
                    $mail->Password = 'finalyearproject2018';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->isHTML(false);
                    $mail->setFrom('fypis3352018@gmail.com', 'UDSM Procurement MIS');
                    $mail->addAddress($email, $fullname);
                    $mail->Subject = $subject;
                    $mail->Body    = $message;

                    if ($mail->send()) {
                        $flag = true;
                    }else {
                        $flag = false;
                    }
                }catch(Exception $e) {
                    echo $e;
                }
            }
            return $flag;
        }

        public static function sendEMAIL2($toname, $toemail, $toreplyname, $toreplyemail, $cc, $bcc, $subject, $message, $altmessage, $filepath, $filenewname) {
            $mail = new PHPMailer(true);

            // if(!empty($toname) && !empty($toemail) && empty($toreplyname) && empty($toreplyemail) && empty($cc) && empty($bcc) && !empty($subject) &&)
            try {
                $mail->SMTPDebug = 2;
                // $mail->isSMTP(false);
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = false;
                $mail->Username = 'fypis3352018@gmail.com';
                $mail->Password = 'finalyearproject2018';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
    
                $mail->setFrom('fypis3352018@gmail.com', 'UDSM Procurement MIS');
                $mail->addAddress('walterplatnumz@gmail.com', 'Cainam Walter Smog');
                $mail->addReplyTo('pmis@udsm.ac.tz', 'UDSM Procurement MIS');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');
    
                $mail->isHTML(true);
                $mail->Subject = 'Lorem ipsum dolor sit amet';
                $mail->Body    = 'Lorem, ipsum dolor sit <b>amet</b> consectetur adipisicing elit. Eligendi non ad, error dolorum molestias odio, beatae culpa minima ullam voluptatibus inventore laboriosam consequuntur et ducimus assumenda nam saepe esse facilis cumque voluptatem incidunt placeat quam quidem alias! Aperiam quasi nobis doloremque impedit possimus. Molestiae soluta at adipisci qui optio beatae.';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $filepath = SITE_ROOT.DS.'public'.DS.'admin'.DS.'uploads'.DS.'documents'.DS.'requirements'.DS.'UDSM Procurement Management Information System(UDSM MIS).pdf';
                $mail->addAttachment($filepath , 'PMISProcurement1234.pdf');
                if ($mail->send()) {
                    echo "email is sent";
                }else {
                    echo "Failed to send an email";
                }
            }catch(Exception $e) {
                echo $e;
            }
        }

        public static function isDataAssociatedWithExistInDB($keyword, $data) {
            global $DBInstance;
            $result_array = static::getBySQL("SELECT * FROM ".static::$table_name." WHERE ".$DBInstance->escapeValues($keyword)." = '".$DBInstance->escapeValues($data)."' LIMIT 1");
            if(!empty($result_array)) {
                return array_shift($result_array);
            }
        }

        public static function getLoggedInUserInfoByID2($tablename, $id = 0, $uid) {
            global $DBInstance;

            $sql = "SELECT * ";
            $sql .= "FROM systemusers INNER JOIN roles ON ";
            $sql .= "$tablename.id = $uid AND ";
            $sql .= "$tablename.role_id = roles.id";
        
            $result_array = static::getBySQL($sql);
            if(!empty($result_array)) {
                return array_shift($result_array);
            }
        }

        public static function getLoggedInRoleInfoByID($tablename, $role_id) {
            global $DBInstance;

            $sql = "SELECT $tablename.id, ";
            $sql .= "$tablename.name, ";
            $sql .= "$tablename.description ";
            $sql .= "FROM roles WHERE ";
            $sql .= "$tablename.id = $role_id";
        
            $result_array = static::getBySQL($sql);
            if(!empty($result_array)) {
                return array_shift($result_array);
            }
        }

        public static function getLoggedInUserInfoByID($tablename, $uid) {
            global $DBInstance;

            $sql = "SELECT * ";
            $sql .= "FROM systemusers WHERE ";
            $sql .= "$tablename.id = $uid";
        
            $result_array = static::getBySQL($sql);
            if(!empty($result_array)) {
                return array_shift($result_array);
            }
        }

        // public static function getAllEmailsForThisCategory($tablename, $uid) {
        //     global $DBInstance;

        //     $sql = "SELECT email ";
        //     $sql .= "FROM stakeholders WHERE ";
        //     $sql .= "$tablename.id = $uid AND ";
        //     $sql .= "$tablename.id = $uid AND ";
        
        //     $result_array = static::getBySQL($sql);
        //     if(!empty($result_array)) {
        //         return array_shift($result_array);
        //     }
        // }

        public static function getLoggedInStakeholderInfoByID($tablename, $role_id, $uid) {
            global $DBInstance;
            
            $sql = "SELECT * ";
            $sql .= "FROM stakeholders INNER JOIN roles ON ";
            $sql .= "$tablename.role_id = roles.id AND $tablename.id = $uid LIMIT 1 ";
        
            $result_array = static::getBySQL($sql);
            if(!empty($result_array)) {
                return array_shift($result_array);
            }
        }

        

        public static function getBySQL($sql = "") {
            global $DBInstance;
            $result_set = $DBInstance->querying($sql);
            $object_array = array();
            while($row = $DBInstance->fetchArray($result_set)) {
                $object_array[] = static::instantiate($row);
            }
            return $object_array;
        }

        public static function controlSlider($numOfStory) {
            for($i = 0; $i <= $numOfStory; $i++) {
                if($i == 1) {
                    $active = 1;
                }else {
                    $active = $i;
                }
                if($i == 1) {
                    echo "<li data-target=\"#carousel-story-slider\" data-slide-to=\"<?php echo $i; ?>\" class=\"active\"></li>";
                }else {
                    echo "<li data-target=\"#carousel-story-slider\" data-slide-to=\"<?php echo $i; ?>\"></li>";
                }
            }
        }

        public static function getAllSliderStory() {
            $sql = "SELECT * FROM stories WHERE status = 'published' ORDER BY id DESC LIMIT 5";
            $result = Story::getBySQL($sql);
            return $result;
        }

        public static function getCountTenderStages($tenderid) {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ".static::$table_name." WHERE tenderid = $tenderid";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountMySubmittedRequirement($requsteruid) {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name." WHERE requesterid = ".$requsteruid;
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAll() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name;
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllCommittee() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name ." WHERE role_name = 'board'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllApprovedVerified() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name ." WHERE status = 'approved' AND verification = 'verified'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllUnApprovedUnVerified() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name . " WHERE status = 'unapproved' AND verification = 'unverified'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllVerifiedUnApproved() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE verification = 'verified' AND status = 'unapproved'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllApproved() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE status = 'approved'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllApprovedAndOnGoing() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE status = 'approved' OR status = 'ongoing'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllApprovedTenderForMyCategory() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE status = 'approved'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllUnApproved() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE status = 'unapproved'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllOnGoing() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE status = 'ongoing'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountYourTenders($uid) {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE stakeholderid = '$uid'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getCountAllClosed() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name. " WHERE status = 'closed'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        public static function getStoryCount() {
            global $DBInstance;
            $sql =  "SELECT COUNT(*) FROM ". static::$table_name ." WHERE status = 'published'";
            $result_set = $DBInstance->querying($sql);
            $row = $DBInstance->fetchArray($result_set);
            return array_shift($row);
        }

        private static function instantiate($record) {
            $class_name = get_called_class();
            $object = new $class_name;

            foreach($record as $attribute=>$value) {
                if($object->has_attribute($attribute)) {
                    $object->$attribute = $value;
                }
            }
            return $object;
        }

        private function has_attribute($attribute) {
            $object_vars = $this->attribute();
            return array_key_exists($attribute, $object_vars);
        }

        protected function attribute() {
            $object_property_attributes = array();
            if(!empty(static::$db_fields)){
                foreach(static::$db_fields as $field) {
                    if(property_exists($this, $field)) {
                        $object_property_attributes[$field] = $this->$field;
                    }
                }
            }
            return $object_property_attributes;
        }

        protected function sanitized_attributes() {
            global $DBInstance;

            $clean_escaped_attributes = array();
            foreach($this->attribute() as $key => $value) {
                $clean_escaped_attributes[$key] = $DBInstance->escapeValues($value);
            }
            return $clean_escaped_attributes;
        }

        public function save() {
            if(isset($this->id)) {
                $this->update();
            }else if(!isset($this->id)){
                $this->create();
            }
        }

        public function create() {
            global $DBInstance;
            $class_attributes = $this->sanitized_attributes();
            $sql = "INSERT INTO ".static::$table_name." (";
            $sql .= join(", ", array_keys($class_attributes));
            $sql .= ") VALUES ('";
            $sql .= join("', '", array_values($class_attributes));
            $sql .= "')";

            if($DBInstance->querying($sql)){
                $this->id = $DBInstance->insertID();
                return true;
            }else {
                return false;
            }
        }

        public static function checkIfTenderIsAtAlreadyAtCurrentAddedStage($tenderid, $progressid) {
            global $DBInstance;
            return static::getBySQL("SELECT * FROM ".static::$table_name." WHERE ".$DBInstance->escapeValues('tenderid')." = '".$DBInstance->escapeValues($tenderid)."' AND ".$DBInstance->escapeValues('stageid')." = '".$DBInstance->escapeValues($progressid)."' LIMIT 1");
        }

        public static function updateDataToDatabase($dataid, $colname, $data) {
            global $DBInstance;

            $sql = "UPDATE ".static::$table_name." SET ".$DBInstance->escapeValues($colname)." = '".$DBInstance->escapeValues($data)."'";
            $sql .= " WHERE id = ".$DBInstance->escapeValues($dataid)."";

            if($DBInstance->querying($sql)) {
                if($DBInstance->affectedRows() == 1) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public function update() {
            global $DBInstance;

            $class_attributes = $this->sanitized_attributes();
            $attribute_pairs = array();

            foreach($class_attributes as $key => $value) {
                $attribute_pairs[] = "{$key}='{$value}'";
            }

            $sql = "UPDATE ".static::$table_name." SET ";
            $sql .= join(", ", $attribute_pairs);
            $sql .= " WHERE id=". $DBInstance->escapeValues($this->id);

            if($DBInstance->querying($sql)) {
                if($DBInstance->affectedRows() == 1) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public function delete() {
            global $DBInstance;

            $sql = "DELETE FROM ".static::$table_name." ";
            $sql .= "WHERE id=".$DBInstance->escapeValues($this->id);
            $sql .= " LIMIT 1";

            if($DBInstance->querying($sql)) {
                if($DBInstance->affectedRows() == 1) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public static function customDelete($keyword, $data) {
            global $DBInstance;

            $sql = "DELETE FROM ".static::$table_name." ";
            $sql .= "WHERE $keyword="."'".$DBInstance->escapeValues($data)."'";
            $sql .= " LIMIT 1";

            if($DBInstance->querying($sql)) {
                if($DBInstance->affectedRows() == 1) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        function downloadFile($path, $filename){
            $filepath =  $path.DS.$filename;
            if(file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
                readfile($filepath);
                $flag = true;
                exit;
            }else {
                $flag = false;
            }
            return $flag;
        }

        public function user_role_exist_in_db() {
            global $DBInstance;
            $sql = "SELECT name FROM ".static::$table_name." ";
            $sql .= "WHERE name = ".$DBInstance->escapeValues($this->id);
            $sql .= " LIMIT 1";

            if($DBInstance->querying($sql)) {
                if($DBInstance->affectedRows() == 1) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public function user_exist_in_db() {
            global $DBInstance;
            $sql = "SELECT name FROM ".static::$table_name." ";
            $sql .= "WHERE name = ".$DBInstance->escapeValues($this->id);
            $sql .= " LIMIT 1";

            if($DBInstance->querying($sql)) {
                if($DBInstance->affectedRows() == 1) {
                    return true;
                }else {
                    return false;
                }
            }
        }
    }
?>