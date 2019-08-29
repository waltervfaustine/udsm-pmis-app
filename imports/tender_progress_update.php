<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
    
    class TenderProgressUpdate extends DatabaseMANI {

        public static $table_name = "tender_progress_update";
        public static $db_fields = array('id', 'stageid', 'tenderid', 'timestamp', 'updaterid');

        public $id;
        public $stageid;
        public $tenderid;
        public $timestamp;
        public $updaterid;

        function __construct(){ }

        public function addTenderProgressUpdateToInstancesVars($id, $stageid, $tenderid, $timestamp, $updaterid) {
            if(!empty($id) && !empty($stageid) && !empty($tenderid) && !empty($timestamp) && !empty($updaterid)) {
                $this->id = $id;
                $this->stageid = $stageid;
                $this->tenderid = $tenderid;
                $this->timestamp = $timestamp;
                $this->updaterid = $updaterid;
                return true;
            }else if(empty($id) && !empty($stageid) && !empty($tenderid) && !empty($timestamp) && !empty($updaterid)){
                $this->id = $id;
                $this->stageid = $stageid;
                $this->tenderid = $tenderid;
                $this->timestamp = $timestamp;
                $this->updaterid = $updaterid;
                return true;
            }else {
                return false;
            }
        }

        public function AddTenderProgrssUpdateToDatabase() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    unset($this->id);
                    unset($this->stageid);
                    unset($this->tenderid);
                    unset($this->timestamp);
                    unset($this->updaterid);
                    $session->message("Tender Progress Update is successfully updated!");
                    $cont = true;
                    redirect_to("../onofftenders/ongoing.php?pg=1");
                }
            }else {
                if ($this->create()) {
                    unset($this->id);
                    unset($this->stageid);
                    unset($this->tenderid);
                    unset($this->timestamp);
                    unset($this->updaterid);
                    $session->message("Tender Progress Update is successfully updated for the particular Tender!");
                    redirect_to("../onofftenders/ongoing.php?pg=1");
                    $cont = true;
                }
            }
            redirect_to("../onofftenders/ongoing.php?pg=1");
            return $cont;
        }
    }
?>