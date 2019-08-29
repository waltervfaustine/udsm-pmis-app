<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class UserRequirement extends DatabaseMANI {

        protected static $table_name = "user_requirements";
        protected static $db_fields = array('id', 'title', 'body', 'filename', 'type', 'size', 'status', 'requesterid', 'timestamp');

        public $id;
        public $title;
        public $body;
        public $filename;
        public $type;
        public $size;
        public $status;
        public $requesterid;
        public $timestamp;
        
        private $temp_path;
        protected $upload_directory = "requirement_doc";
        public $errors = array();

        protected $upload_error = array(
            UPLOAD_ERR_OK => "No errors",
            UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
            UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE",
            UPLOAD_ERR_PARTIAL => "Partial upload",
            UPLOAD_ERR_NO_FILE => "No File",
            UPLOAD_ERR_NO_TMP_DIR => "No temporary directory",
            UPLOAD_ERR_CANT_WRITE => "Can't write to disk",
            UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
        );

       public function attachRequirementPropsToInstanceVars($file) {
            global $session;

            if(!$file || empty($file) || !is_array($file)) {
                $this->errors[] = "No file was uploaded.";
                $session->message("No file was uploaded.");
                redirect_to("../tenderreq/index.php?pg=1");
                return false;
            }else if($file['error'] != 0) {
                    $this->errors[] = $this->upload_error[$file['error']];
                    $session->message($this->upload_error[$file['error']]);
                    return false;
            }else {
                    $this->temp_path    = $file['tmp_name'];
                    $this->filename     = basename($file['name']);
                    $this->type         = $file['type'];
                    $this->size         = $file['size'];
                    return true;
            }
       } 

        public function getUserRequrementFormData($documentID=0, $title, $body, $status, $requesterid, $timestamp) {
            $this->id = $documentID;   
            $this->title = $title;
            $this->body =  $body;
            $this->status =  $status;
            $this->requesterid =  $requesterid;
            $this->timestamp =  $timestamp;
            return true;
        }

        public function addRequirementInstanceVar($documentID, $title, $body, $status, $requesterid, $timestamp) {
            if(!empty($documentID) && !empty($title) && !empty($body)) {
                $this->id = $documentID;
                $this->title = $title;
                $this->body = $body;
                $this->status =  $status;
                $this->requesterid =  $requesterid;
                $this->timestamp =  $timestamp;
                return true;
            }else if(empty($documentID) && !empty($title) && !empty($body) && !empty($status) && !empty($requesterid) && !empty($timestamp)){
                $this->title = $title;
                $this->body = $body;
                $this->status =  $status;
                $this->requesterid =  $requesterid;
                $this->timestamp =  $timestamp;
                return true;
            }else {
                return false;
            }
            
        }

        public function preparingDataForSubmission() {
            global $session;
            $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->upload_directory.DS.$this->filename;
            if(file_exists($target_path)) {
                if(UserRequirement::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    $session->message("The file {$this->filename} already exists");
                    return false;
                }else {
                    $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->requirementFilepath();
                    if(unlink($target_path)) {
                        $this->saveDataToDatabase();
                    }
                    return false;
                }
            }else {
                if(UserRequirement::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    if (UserRequirement::customDelete('filename', $this->filename)) {
                        $this->saveDataToDatabase();
                    }else {
                        $session->message("Failed to insert {$this->filename} in the database");
                    }
                    return false;
                }else {
                    $this->saveDataToDatabase();
                }
            }
        }

        public function saveDataToDatabase() {
            global $session;
            $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->upload_directory.DS.$this->filename;

            if(isset($this->id)) {
                if($this->update()) {
                    unset($_SESSION['requirement_title']);
                    unset($_SESSION['requirement_desc']);
                    unset($_SESSION['requirement_id']);
                    unset($_SESSION['requirement_status']);
                    unset($_SESSION['requirement_requesterid']);
                    $session->message("User Requirement Document is successfully Updated");
                    return true;
                    redirect_to("../tenderreq/index.php?pg=1");
                }else {
                    unset($_SESSION['requirement_title']);
                    unset($_SESSION['requirement_desc']);
                    unset($_SESSION['requirement_id']);
                    unset($_SESSION['requirement_status']);
                    unset($_SESSION['requirement_requesterid']);
                    $session->message("Nothing has been updated!");
                    return false;
                    redirect_to("../tenderreq/index.php?pg=1");
                }
            }else {
                if(!empty($this->errors)) {
                    return false;
                }
                if(empty($this->filename) || empty($this->temp_path)){
                    $this->errors[] = "The file location was not available.";
                    $session->message("The file location was not available.");
                    redirect_to("../tenderreq/index.php?pg=1");
                    return false;
                }

                if(move_uploaded_file($this->temp_path, $target_path)) {
                    if($this->create()){
                        unset($this->id);
                        unset($this->title);
                        unset($this->body);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($this->timestamp);
                        unset($_SESSION['requirement_title']);
                        unset($_SESSION['requirement_desc']);
                        unset($_SESSION['requirement_status']);
                        unset($_SESSION['requirement_requesterid']);
                        $session->message("User Requirement is successfully submitted");
                        return true;
                    }else {
                        unset($this->id);
                        unset($this->title);
                        unset($this->body);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($this->status);
                        unset($this->requesterid);
                        unset($this->timestamp);
                    }
                }else {
                    $this->errors[] = "The file upload failed, possibly due to incorrect permission on the upload folder";
                    $session->message("The file upload failed, possibly due to incorrect permission on the upload folder");
                    return false;
                }
            }
        }

        public function deleteUserRequirement() {
            global $session;
            if($this->delete()) {
                $session->message("Requirement Document <strong>{".$this->title."}</strong> is successfully deleted!");
                $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->requirementFilepath();
                if(unlink($target_path)) {
                    return true;
                    redirect_to("../tenderreq/index.php?pg=1");
                }
                return true;
            }else {
                $session->message("Failed to delete <strong>{".$this->title."}<strong> User Requirement!");
                return false;
                redirect_to("../tenderreq/index.php?pg=1");
            }
        }

        public function requirementFilepath(){
            return $this->upload_directory.DS.$this->filename;
        }

        public function load_story_image_to_display(){
            return 'public'.DS.'admin'.DS.'uploads'.DS.'stories'.DS.$this->upload_directory.DS.$this->filename;
        }

        public function size_as_text() {
            if($this->size < 1024) {
                return "{$this->size} bytes";
            }else if($this->size < 1048576) {
                $size_kb = round($this->size/1024);
                return "{$size_kb} KB";
            }else {
                $size_mb = round($this->size/1048576, 1);
                return "{$size_mb} MB";
            }
        }
    }
?>