<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
    
    class TenderBoard extends DatabaseMANI {

        public static $table_name = "tenderboards";
        public static $db_fields = array('id', 'name', 'description');
        public static $expected_tenderboardID;
        public $id;
        public $name;
        public $description;

        function __construct(){ }

        public static function getTenderBoard($Committee_id){
            global $DBInstance;
            $table_name = "tenderboards";
            $tenderboardID = $DBInstance->escapeValues($Committee_id);

            $sql = "SELECT * FROM tenderboards";
            $sql .= " WHERE id = '{$tenderboardID}'";
            $sql .= "LIMIT 1";

            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }


        public function addTenderBoardToInstanceVars($id, $name, $desc) {
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

        public function addTenderBoardToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("Tender Board <strong>".$this->name."</strong> is successfully updated!");
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    unset($_SESSION['tenderboard_name']);
                    unset($_SESSION['tenderboard_desc']);
                    unset($_SESSION['tenderboardID']);
                    $cont = true;
                    redirect_to("../commboard/index.php?pg=1");
                }else {
                    $session->message("Nothing has been updated");
                    redirect_to("../commboard/index.php?pg=1");
                }
            }else {
                if ($this->create()) {
                    $session->message("Tender Board <strong>".$this->name."</strong> is successfully created!");
                    unset($_SESSION['tenderboard_name']);
                    unset($_SESSION['tenderboard_desc']);
                    unset($_SESSION['tenderboardID']);
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    redirect_to("../commboard/index.php?pg=1");
                    $cont = true;
                }
            }
            redirect_to("../commboard/index.php?pg=1");
            return $cont;
        }

        public static function setExpectedtenderboardID($id) {
            self::$expected_tenderboardID = $id;
        }

        public static function getExpectedtenderboardID() {
            return self::$expected_tenderboardID;
        }

        public function deleteTenderBoard() {
            global $session;
            if($this->delete()) {
                $session->message("Tender Board <strong>".$this->name."</strong> is successfully deleted!");
                unset($_SESSION['tenderboard_name']);
                unset($_SESSION['tenderboard_desc']);
                unset($_SESSION['tenderboardID']);
                unset($this->id);
                unset($this->name);
                unset($this->description);
                redirect_to("../commboard/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>".$this->name."<strong> user Tender Board!");
                redirect_to("../commboard/index.php?pg=1");
                return false;
            }
        }
    }


    $systemCommittee = new Committee();
?>