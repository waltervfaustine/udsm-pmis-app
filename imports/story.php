<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class Story extends DatabaseMANI {

        protected static $table_name = "stories";
        protected static $db_fields = array('id', 'title', 'body', 'status', 'filename', 'type', 'size');

        public static $max_file_size = 1048576;
        public $id;
        public $title;
        public $body;
        public $status;
        public $filename;
        public $type;
        public $size;
        
        private $temp_path;
        protected $upload_directory = "stories";
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

       public function attachStoryPhotoPropsToInstanceVars($file) {
            global $session;

            if(!$file || empty($file) || !is_array($file)) {
                $this->errors[] = "No file was uploaded.";
                $session->message("No file was uploaded.");
                redirect_to("../../index.php");
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

        public function addStoryInstanceVar($storyID, $title, $body, $status) {
            if(!empty($storyID) && !empty($title) && !empty($body) && !empty($status)) {
                $this->id = $storyID;
                $this->title = $title;
                $this->body = $body;
                $this->status = $status;
                return true;
            }else if(empty($storyID) && !empty($title) && !empty($body) && !empty($status)){
                $this->title = $title;
                $this->body = $body;
                $this->status = $status;
                return true;
            }else {
                return false;
            }
            
        }

        public function preparingDataForSubmission() {
            global $session;
            $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->upload_directory.DS.$this->filename;
            if(file_exists($target_path)) {
                if(Story::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    $session->message("The file $this->filename already exists");
                    return false;
                }else {
                    $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->image_path();
                    if(unlink($target_path)) {
                        $this->saveDataToDatabase();
                    }
                    return false;
                }
            }else {
                if(Story::isDataAssociatedWithExistInDB('filename', $this->filename)) {
                    if (Story::customDelete('filename', $this->filename)) {
                        $this->saveDataToDatabase();
                    }else {
                        $session->message("Failed to insert in the database");
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
                $this->update();
                $session->message("Public Story is successfully Updated");
                return true;
                unset($_SESSION['story_title']);
                unset($_SESSION['story_body']);
                unset($_SESSION['story_id']);
                redirect_to("../publicarea/index.php?pg=1");
            }else {
                if(!empty($this->errors)) {
                    return false;
                }
                if(empty($this->filename) || empty($this->temp_path)){
                    $this->errors[] = "The file location was not available.";
                    $session->message("The file location was not available.");
                    redirect_to("../publicarea/index.php?pg=1");
                    return false;
                }

                if(move_uploaded_file($this->temp_path, $target_path)) {
                    if($this->create()){
                        $session->message("Public Story is successfully submitted");
                        unset($this->id);
                        unset($this->title);
                        unset($this->body);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($_SESSION['story_title']);
                        unset($_SESSION['story_body']);
                        return true;
                    }else {
                        $session->message("Failed to submit Public Story");
                        unset($this->id);
                        unset($this->title);
                        unset($this->body);
                        unset($this->filename);
                        unset($this->type);
                        unset($this->size);
                        unset($_SESSION['story_title']);
                        unset($_SESSION['story_body']);
                    }
                }else {
                    $this->errors[] = "The file upload failed, possibly due to incorrect permission on the upload folder";
                    $session->message("The file upload failed, possibly due to incorrect permission on the upload folder");
                    return false;
                }
            }
        }

        public function deletePublicStory() {
            global $session;
            if($this->delete()) {
                $session->message("Public Story is successfully deleted!");
                $target_path = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.$this->image_path();
                if(unlink($target_path)) {
                    return true;
                    redirect_to("../publicarea/index.php?pg=1");
                }
                return true;
            }else {
                $session->message("Failed to delete Public Story!");
                return false;
                redirect_to("../publicarea/index.php?pg=1");
            }
        }

        public function image_path(){
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