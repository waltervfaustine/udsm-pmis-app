<?php
    require_once(LIB_PATH.DS.'dbdml.php');      
    require_once(LIB_PATH.DS.'configuration.php');
    require_once(LIB_PATH.DS.'autoload.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'dboperation.php');
    
    class News extends DatabaseMANI {

        public static $table_name = "news";
        public static $db_fields = array('id', 'title', 'body');
        public $id;
        public $title;
        public $body;

        function __construct(){ }

        public function addToNewsDataInstanceVar($newsID, $title, $body) {
            if(!empty($newsID) && !empty($title) && !empty($body)) {
                $this->id = $newsID;
                $this->title = $title;
                $this->body = $body;
                $flag = true;
            }else if(empty($newsID) && !empty($title) && !empty($body)){
                $this->title = $title;
                $this->body = $body;
                $flag = true;
            }else {
                $flag = false;
            }
            return $flag;
        }

        public function addNewsToDB() {
            global $session;
            if(isset($this->id)) {
                if ($this->update()) {
                    $session->message("News Update <strong>".$this->title."</strong> is successfully updated!");
                    unset($this->id);
                    unset($this->title);
                    unset($this->body);
                    unset($_SESSION['news_title']);
                    unset($_SESSION['news_body']);
                    unset($_SESSION['newsID']);
                    return true;
                    redirect_to("../publicarea/index.php?pg=1");
                }else {
                    $session->message("Nothing has been updated.");
                }
                return true;
            }else {
                if ($this->create()) {
                    $session->message("News Update <strong>".$this->title."</strong> is successfully created!");
                    unset($_SESSION['news_title']);
                    unset($_SESSION['news_body']);
                    unset($_SESSION['newsID']);
                    unset($this->id);
                    unset($this->title);
                    unset($this->body);
                    redirect_to("../publicarea/index.php?pg=1");
                    return true;
                }
                return true;
            }
            redirect_to("../publicarea/index.php?pg=1");
            return true;
        }

        public function deleteUserNews() {
            global $session;
            if($this->delete()) {
                unset($_SESSION['news_title']);
                unset($_SESSION['news_body']);
                unset($_SESSION['newsID']);
                unset($this->id);
                unset($this->title);
                unset($this->body);
                $session->message("News is successfully deleted!");
                redirect_to("../publicarea/index.php?pg=1");
                return true;
            }else {
                $session->message("Failed to delete News!");
                redirect_to("../publicarea/index.php?pg=1");
                return false;
            }
        }
    }
?>