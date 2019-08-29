<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class IdentificationCard extends DatabaseMANI {

        public static $table_name = "identification_cards";
        public static $db_fields = array('id', 'name', 'description');
        public $id;
        public $name;
        public $description;

        function __construct(){
           
        }

        public function addIDCardToInstanceVars($id, $name, $desc) {
            if(!empty($name) && !empty($desc) && !empty($id)) {
                $this->id = $id;
                $this->name = $name;
                $this->description = $desc;
                return true;
            }else if(!empty($name) && !empty($desc) && empty($id)){
                $this->name = $name;
                $this->description = $desc;
                return true;
            }else {
                return false;
            }
        }

        public function addIDCardToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("ID Card <strong>".$this->name."</strong> is successfully updated!");
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    unset($_SESSION['idcard_name']);
                    unset($_SESSION['idcard_desc']);
                    unset($_SESSION['idcard_id']);
                    $cont = true;
                    redirect_to("../idcard/index.php?pg=1");
                }else {
                    $session->message("Nothing has been updated");
                }
            }else {
                if ($this->create()) {
                    $session->message("ID Card <strong>".$this->name."</strong> is successfully created!");
                    unset($_SESSION['idcard_name']);
                    unset($_SESSION['idcard_desc']);
                    unset($_SESSION['idcard_id']);
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    redirect_to("../idcard/index.php?pg=1");
                    $cont = true;
                }
            }
            redirect_to("../idcard/index.php?pg=1");
            return $cont;
        }

        public function deleteIDCard() {
            global $session;
            if($this->delete()) {
                $session->message("ID Card <strong>".$this->name."</strong> is successfully deleted!");
                unset($_SESSION['idcard_name']);
                unset($_SESSION['idcard_desc']);
                unset($_SESSION['idcard_id']);
                unset($this->id);
                unset($this->name);
                unset($this->description);
                redirect_to("../idcard/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>".$this->name."<strong> ID Card!");
                redirect_to("../idcard/index.php?pg=1");
                return false;
            }
        }
    }
?>