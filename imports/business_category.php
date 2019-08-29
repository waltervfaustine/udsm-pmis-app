<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class BusinessCategory extends DatabaseMANI {

        public static $table_name = "business_categories";
        public static $db_fields = array('id', 'title', 'body');
        public $id;
        public $title;
        public $body;

        function __construct(){
           
        }

        public function addBusinessCategoryInstanceVar($id, $title, $body) {
            if(!empty($id) && !empty($title) && !empty($body)) {
                $this->id = $id;
                $this->title = $title;
                $this->body = $body;
                return true;
            }else if(empty($id) && !empty($title) && !empty($body)){
                $this->title = $title;
                $this->body = $body;
                return true;
            }
            return true;
        }

        public function addBusinessCategoryToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("Business Category <strong>".$this->title."</strong> is successfully updated!");
                    $cont = true;
                }else{
                    $session->message("Nothing has been updated!");
                    $cont = true;
                }
            }else {
                if ($this->create()) {
                    $session->message("Business Category <strong>".$this->title."</strong> is successfully created!");
                    $cont = true;
                }
            }
            redirect_to("../tender/index.php?pg=1");
            return $cont;
        }

        public function deleteBusinessCategory() {
            global $session;
            if($this->delete()) {
                $session->message("Business Category <strong>{".$this->title."}</strong> is successfully deleted!");
                redirect_to("../tender/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>{".$this->title."}<strong> user Business Category!");
            redirect_to("../tender/index.php?pg=1");
                return false;
            }
        }
    }
?>