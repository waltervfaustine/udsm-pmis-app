<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
    
    class TenderApplication extends DatabaseMANI {

        protected static $table_name = "tender_applications";
        protected static $db_fields = array('id', 'comment', 'stakeholderid', 'tenderid', 'timestamp', 'filename', 'type', 'size', 'status', 'award');

        public $id;
        public $comment;
        public $stakeholderid;
        public $tenderid;
        public $timestamp;
        public $filename;
        public $type;
        public $size;
        public $status;
        public $award;
        
        private $temp_path;
        protected $upload_directory = "tender_application_doc";
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

        public function attachApplicationDocumentPropsToInstanceVars($file) {
            global $session;

            if(!$file || empty($file) || !is_array($file)) {
                $this->errors[] = "No file was uploaded.";
                $session->message("No file was uploaded.");
                redirect_to("../applytender/index.php?pg=1");
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

        public function getTenderFormData($id, $comment, $stakeholderid, $tenderid, $timestamp, $filename, $type, $size, $status, $award) {
            $this->id = $id;   
            $this->comment = $comment;
            $this->stakeholderid =  $stakeholderid;
            $this->tenderid =  $tenderid;
            $this->timestamp =  $timestamp;
            $this->filename =  $filename;
            $this->type =  $type;
            $this->size =  $size;
            $this->status =  $status;
            $this->award =  $award;
            return true;
        }

        public function preparingDataForSubmission() {
            global $session;
            $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->upload_directory.DS.$this->filename;
            if(file_exists($target_path)) {
                if(TenderApplication::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    $session->message("The file {$this->filename} already exists");
                    return false;
                }else {
                    $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->applicationDocumentFilePath();
                    if(unlink($target_path)) {
                        $this->saveDataToDatabase();
                    }
                    return false;
                }
            }else {
                if(TenderApplication::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    if (TenderApplication::customDelete('filename', $this->filename)) {
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
                    unset($_SESSION['stkapply_comment']);
                    unset($_SESSION['stkapply_stakeholderid']);
                    unset($_SESSION['stkapply_tenderid']);
                    $session->message("Tender Application <strong>$this->title</strong> is successfully Updated");
                    
                    unset($this->id);
                    unset($this->comment);
                    unset($this->stakeholderid);
                    unset($this->tenderid);
                    unset($this->timestamp);
                    unset($this->filename);
                    unset($this->type);
                    unset($this->size);
                    unset($this->award);
                    return true;
                    redirect_to("../applytender/index.php?pg=1");
                }else {
                    unset($_SESSION['stkapply_comment']);
                    unset($_SESSION['stkapply_stakeholderid']);
                    unset($_SESSION['stkapply_tenderid']);
                    $session->message("Nothing has been updated!");
                    unset($this->id);
                    unset($this->comment);
                    unset($this->stakeholderid);
                    unset($this->tenderid);
                    unset($this->timestamp);
                    unset($this->filename);
                    unset($this->type);
                    unset($this->size);
                    unset($this->size);
                    unset($this->status);
                    unset($this->award);
                    return false;
                    redirect_to("../applytender/index.php?pg=1");
                }
            }else {
                if(!empty($this->errors)) {
                    return false;
                }
                if(empty($this->filename) || empty($this->temp_path)){
                    $session->message("The file location was not available.");
                    redirect_to("../applytender/index.php?pg=1");
                    return false;
                }

                if(move_uploaded_file($this->temp_path, $target_path)) {
                    if($this->create()){
                        unset($this->id);
                        unset($this->comment);
                        unset($this->stakeholderid);
                        unset($this->tenderid);
                        unset($this->timestamp);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($this->status);
                        unset($this->award);
                        unset($_SESSION['stkapply_comment']);
                        unset($_SESSION['stkapply_stakeholderid']);
                        unset($_SESSION['stkapply_tenderid']);
                        $session->message("Application Tender is successfully submitted");
                        return true;
                    }else {
                        unset($this->id);
                        unset($this->comment);
                        unset($this->stakeholderid);
                        unset($this->tenderid);
                        unset($this->timestamp);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($this->status);
                        unset($this->award);
                    }
                }else {
                    $session->message("The file upload failed, possibly due to incorrect permission on the upload folder");
                    return false;
                }
            }
        }


        public function applicationDocumentFilePath(){
            return $this->upload_directory.DS.$this->filename;
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

        public static function uploadAwardingLetter($tmp, $tpath, $doc) {
            if(move_uploaded_file($tmp, $tpath)) {
                global $DBInstance, $session;
                $collapse_tender_applicationid = $DBInstance->escapeValues($_POST['collapse_tender_applicationid']);
                $collapse_assigning_winning = $DBInstance->escapeValues($doc);
                $tender_application_colname = 'award';
                
                if(TenderApplication::updateDataToDatabase($collapse_tender_applicationid, $tender_application_colname, $collapse_assigning_winning)) {
                    $session->message("You have successfully send awarding letter to Tenderer");
                    redirect_to("../../applicationtenders/index.php?pg=1");
                }else {
                    $session->message("Failed to send awarding letter to tenderer");
                    redirect_to("../../applicationtenders/index.php?pg=1");
                }
            }
        }

        public static function uploadAwardingLetterPMUOfficer($tmp, $tpath, $doc) {
            if(move_uploaded_file($tmp, $tpath)) {
                global $DBInstance, $session;
                $collapse_tender_applicationid = $DBInstance->escapeValues($_POST['collapse_tender_applicationid']);
                $collapse_assigning_winning = $DBInstance->escapeValues($doc);
                $tender_application_colname = 'award';
                
                if(TenderApplication::updateDataToDatabase($collapse_tender_applicationid, $tender_application_colname, $collapse_assigning_winning)) {
                    $session->message("You have successfully send awarding letter to Tenderer");
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }else {
                    $session->message("Failed to send awarding letter to tenderer");
                    redirect_to("../../applicationtenders/apptend.php?pg=1");
                }
            }
        }

        public static function checkIfFileExist($tmp, $target, $doc) {
            if(file_exists($target_path)) {
                if(TenderApplication::isDataAssociatedWithExistInDB('status', $doc)) {
                    $session->message("The file $doc already exists");
                    return false;
                }else {
                    if(unlink($target_path)) {
                        TenderApplication::uploadAwardingLetter($tmp, $target, $doc);
                        return true;
                    }
                    return false;
                }
            }else {
                if(TenderApplication::isDataAssociatedWithExistInDB('status', $doc)) {
                    if (TenderApplication::customDelete('status', $doc)) {
                        TenderApplication::uploadAwardingLetter($tmp, $target, $doc);
                        return true;
                    }else {
                        $session->message("Failed To Submit award letter.");
                    }
                    return false;
                }else {
                    TenderApplication::uploadAwardingLetter($tmp, $target, $doc);
                    return true;
                }
            }
        }

        public static function checkIfFileExistPMUOfficer($tmp, $target, $doc) {
            if(file_exists($target_path)) {
                if(TenderApplication::isDataAssociatedWithExistInDB('status', $doc)) {
                    $session->message("The file $doc already exists");
                    return false;
                }else {
                    if(unlink($target_path)) {
                        TenderApplication::uploadAwardingLetterPMUOfficer($tmp, $target, $doc);
                        return true;
                    }
                    return false;
                }
            }else {
                if(TenderApplication::isDataAssociatedWithExistInDB('status', $doc)) {
                    if (TenderApplication::customDelete('status', $doc)) {
                        TenderApplication::uploadAwardingLetterPMUOfficer($tmp, $target, $doc);
                        return true;
                    }else {
                        $session->message("Failed To Submit award letter.");
                    }
                    return false;
                }else {
                    TenderApplication::uploadAwardingLetterPMUOfficer($tmp, $target, $doc);
                    return true;
                }
            }
        }
    }
?>