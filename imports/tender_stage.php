<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
    
    class TenderStage extends DatabaseMANI {

        public static $table_name = "tender_stages";
        public static $db_fields = array('id', 'title', 'description');
        public $id;
        public $title;
        public $description;

        function __construct(){}

        public function addTenderStageToDB() {
            global $session;
            
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("Tender Stage is successfully updated!");
                    $this->unsetInstanceVariables();
                    return true;
                    redirect_to("../tenderstage/index.php?pg=1");
                }
            }else {
                if ($this->create()) {
                    $session->message("Tender Stage is successfully created!");
                    $this->unsetInstanceVariables();
                    redirect_to("../tenderstage/index.php?pg=1");
                    return true;
                }
            }
        }

        public function unsetInstanceVariables() {
            unset($this->id);
            unset($this->title);
            unset($this->description);
            return true;
        }

        public function deleteTenderStage() {
            global $session;
            if($this->delete()) {
                $session->message("Tender Stage is successfully deleted!");
                $this->unsetInstanceVariables();
                redirect_to("../tenderstage/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete Tender Stage!");
                redirect_to("../tenderstage/index.php?pg=1");
                return false;
            }
        }
    }
?>