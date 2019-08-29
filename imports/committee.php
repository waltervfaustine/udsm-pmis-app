<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
     
    class Committee extends DatabaseMANI {

        public static $table_name = "committees";
        public static $db_fields = array('id', 'name', 'description');
        public static $expected_committeeID;
        public $id;
        public $name;
        public $description;

        function __construct(){
           
        }

        public static function getCommittee($Committee_id){
            global $DBInstance;
            $table_name = "committees";
            $committeeID = $DBInstance->escapeValues($Committee_id);

            $sql = "SELECT * FROM committees";
            $sql .= " WHERE id = '{$committeeID}'";
            $sql .= "LIMIT 1";

            $result_array = self::getBySQL($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }


        public function addCommitteeToInstanceVars($id, $name, $desc) {
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

        public function addCommitteeToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("Committee <strong>".$this->name."</strong> is successfully updated!");
                    unset($this->id);
                    unset($this->name);
                    unset($this->description);
                    unset($_SESSION['committee_name']);
                    unset($_SESSION['committee_desc']);
                    unset($_SESSION['committeeID']);
                    $cont = true;
                    redirect_to("../commboard/index.php?pg=1");
                }else {
                    $session->message("Nothing has been updated.");
                }
            }else {
                if ($this->create()) {
                    $session->message("Committee <strong>".$this->name."</strong> is successfully created!");
                    unset($_SESSION['committee_name']);
                    unset($_SESSION['committee_desc']);
                    unset($_SESSION['committeeID']);
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

        public static function setExpectedcommitteeID($id) {
            self::$expected_committeeID = $id;
        }

        public static function getExpectedcommitteeID() {
            return self::$expected_committeeID;
        }

        public function deleteCommittee() {
            global $session;
            if($this->delete()) {
                $session->message("Committee <strong>".$this->name."</strong> is successfully deleted!");
                unset($_SESSION['committee_name']);
                unset($_SESSION['committee_desc']);
                unset($_SESSION['committeeID']);
                unset($this->id);
                unset($this->name);
                unset($this->description);
                redirect_to("../commboard/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete <strong>".$this->name."<strong> user Committee!");
                redirect_to("../commboard/index.php?pg=1");
                return false;
            }
        }
    }


    $systemCommittee = new Committee();
?>