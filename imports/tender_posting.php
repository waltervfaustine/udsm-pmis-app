<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
    
    class TenderPosting extends DatabaseMANI {

        protected static $table_name = "tenderlist";
        protected static $db_fields = array('id', 'title', 'body', 'categoryid', 'posteruid', 'requesteruid', 'requirementid', 'status', 'timestamp', 'filename', 'type', 'size', 'committeeid', 'boardid');

        public $id;
        public $title;
        public $body;
        public $categoryid;
        public $posteruid;
        public $requesteruid;
        public $requirementid;
        public $status;
        public $timestamp;
        public $filename;
        public $type;
        public $size;
        public $committeeid;
        public $boardid;
        
        private $temp_path;
        protected $upload_directory = "tender_documentation";
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

        public function attachTendersPropsToInstanceVars($file) {
            global $session;

            if(!$file || empty($file) || !is_array($file)) {
                $this->errors[] = "No file was uploaded.";
                $session->message("No file was uploaded.");
                redirect_to("../preptender/index.php?pg=1");
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

        public function getTenderFormData($documentID=0, $title, $body, $status, $requesteruid, $timestamp) {
            $this->id = $documentID;   
            $this->title = $title;
            $this->body =  $body;
            $this->status =  $status;
            $this->requesteruid =  $requesteruid;
            $this->timestamp =  $timestamp;
            return true;
        }

        public function addTenderInstanceVar($id, $title, $body, $categoryid, $posteruid, $requesteruid, $requirementid, $status, $timestamp, $filename, $committeeid, $boardid) {
            if(!empty($id) && !empty($title) && !empty($body) && !empty($categoryid) && !empty($posteruid) && !empty($requesteruid) && !empty($requirementid) && !empty($status) && !empty($timestamp) && !empty($committeeid) && !empty($boardid)) {
                $this->$id = $id;
                $this->$title = $title;
                $this->$body = $body;
                $this->$categoryid = $categoryid;
                $this->$posteruid = $posteruid;
                $this->$requesteruid = $requesteruid;
                $this->$requirementid = $requirementid;
                $this->$status = $status;
                $this->$timestamp = $timestamp;
                $this->$filename = $filename;
                $this->$committeeid = $committeeid;
                $this->$boardid = $boardid;
                return true;
            }else if(empty($id) && !empty($title) && !empty($body) && !empty($categoryid) && !empty($posteruid) && !empty($requesteruid) && !empty($requirementid) && !empty($status) && !empty($timestamp) && !empty($committeeid) && !empty($boardid)){
                $this->$title = $title;
                $this->$body = $body;
                $this->$categoryid = $categoryid;
                $this->$posteruid = $posteruid;
                $this->$requesteruid = $requesteruid;
                $this->$requirementid = $requirementid;
                $this->$status = $status;
                $this->$timestamp = $timestamp;
                $this->$filename = $filename;
                $this->$committeeid = $committeeid;
                $this->$boardid = $boardid;
                return true;
            }else {
                return false;
            }
            
        }

        public function unsetInstanceVar() {
            unset($_SESSION['preptender_title']);
            unset($_SESSION['preptender_desc']);
            unset($_SESSION['preptender_categoryid']);
            unset($_SESSION['preptender_currentuid']);
            unset($_SESSION['preptender_requesterid']);
            unset($_SESSION['preptender_timestamp']);
            unset($_SESSION['preptender_status']);
            unset($_SESSION['preptender_committeeid']);
            unset($_SESSION['preptender_tenderboardid']);
        }

        public function preparingDataForSubmission() {
            global $session;
            $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->upload_directory.DS.$this->filename;
            if(file_exists($target_path)) {
                if(TenderPosting::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    $session->message("The file {$this->filename} already exists");
                    return false;
                }else {
                    $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->tenderFilepath();
                    if(unlink($target_path)) {
                        if($this->saveDataToDatabase()) {
                            $this->unsetInstanceVar();
                        }
                    }
                    return false;
                }
            }else {
                if(TenderPosting::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    if (TenderPosting::customDelete('filename', $this->filename)) {
                        if($this->saveDataToDatabase()) {
                            
                            $this->unsetInstanceVar();
                        }
                    }else {
                        $session->message("Failed to insert {$this->filename} in the database");
                    }
                    return false;
                }else {
                    if($this->saveDataToDatabase()) {
                        $this->unsetInstanceVar();
                    }
                }
            }
        }

        public function saveDataToDatabase() {
            global $session;
            $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->upload_directory.DS.$this->filename;

            if(isset($this->id)) {
                if($this->update()) {
                    unset($_SESSION['preptender_title']);
                    unset($_SESSION['preptender_desc']);
                    unset($_SESSION['preptender_category']);
                    unset($_SESSION['preptender_currentuid']);
                    unset($_SESSION['preptender_requesteruid']);
                    unset($_SESSION['preptender_reqid']);
                    unset($_SESSION['preptender_timestamp']);
                    unset($_SESSION['preptender_status']);
                    $session->message("Tender <strong>$this->title</strong> is successfully Updated");
                    unset($this->id);
                    unset($this->title);
                    unset($this->body);
                    unset($this->categoryid);
                    unset($this->posteruid);
                    unset($this->requesteruid);
                    unset($this->requirementid);
                    unset($this->status);
                    unset($this->timestamp);
                    unset($this->filename);
                    return true;
                    redirect_to("../preptender/index.php?pg=1");
                }else {
                    unset($_SESSION['preptender_title']);
                    unset($_SESSION['preptender_desc']);
                    unset($_SESSION['preptender_category']);
                    unset($_SESSION['preptender_currentuid']);
                    unset($_SESSION['preptender_requesteruid']);
                    unset($_SESSION['preptender_reqid']);
                    unset($_SESSION['preptender_timestamp']);
                    unset($_SESSION['preptender_status']);
                    $session->message("Nothing has been updated!");
                    unset($this->id);
                    unset($this->title);
                    unset($this->body);
                    unset($this->categoryid);
                    unset($this->posteruid);
                    unset($this->requesteruid);
                    unset($this->requirementid);
                    unset($this->status);
                    unset($this->timestamp);
                    unset($this->filename);
                    return false;
                    redirect_to("../preptender/index.php?pg=1");
                }
            }else {
                if(!empty($this->errors)) {
                    return false;
                }
                if(empty($this->filename) || empty($this->temp_path)){
                    $session->message("The file location was not available.");
                    redirect_to("../preptender/index.php?pg=1");
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
                        unset($_SESSION['requirement_requesteruid']);
                        $session->message("Tender is successfully submitted");
                        return true;
                    }else {
                        unset($this->id);
                        unset($this->title);
                        unset($this->body);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($this->status);
                        unset($this->requesteruid);
                        unset($this->timestamp);
                    }
                }else {
                    $session->message("The file upload failed, possibly due to incorrect permission on the upload folder");
                    return false;
                }
            }
        }

        public function deleteTenderPosting() {
            global $session;
            if($this->delete()) {
                $session->message("Tender <strong>".$this->title."</strong> is successfully deleted!");
                $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->tenderFilepath();
                if(unlink($target_path)) {
                    return true;
                    redirect_to("../preptender/index.php?pg=1");
                }
                return true;
            }else {
                $session->message("Failed to delete Tender <strong>".$this->title."<strong>!");
                return false;
                redirect_to("../preptender/index.php?pg=1");
            }
        }

        public function tenderFilepath(){
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