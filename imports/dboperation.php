<?php
    require_once(LIB_PATH.DS."configuration.php");

    class MySQLDatabase {
        private $connection;
        private $real_escape_string_exists;
        private $magic_quotes_active;
        public $last_query;
        public $last_query_message;

        function __construct() {
            $this->openDBConnection();
            $this->magic_quotes_active = get_magic_quotes_gpc();
            $this->real_escape_string_exists = function_exists("mysql_real_escape_string");
        }

        public function openDBConnection() {
            $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
            if($this->connection === null) {
                die('Database connection failed!.');
            }else {
                $selected_db = mysqli_select_db($this->connection, DB_NAME);
                if(!$selected_db) {
                    die('Failed to select the database!.' . mysqli_connect_errno());
                }else {
                }
                //  die('Database connection successfully!.');
            }
        }

        public function returnConnection() {
            return $this->connection;
        }

        public function closeDBConnection() {
            if(isset($this->connection)) {
                mysqli_close($this->connection);
                unset($this->connection);
            }
        }

        public function querying($sql) {
            $this->last_query = $sql;
            $result = mysqli_query($this->connection, $sql);
            if($result){
                $this->confirmQuery($result);
                // die($sql);
                // echo $sql;
            }else {
                die($sql);
            }
            return $result;
        }

        public function confirmQuery($result_set) {
            if(!$result_set) {
                $message = "Database Query Failed";
                $output = "Database Query Failed: </br>";
                $output .= "Last SQL query: " . $this->last_query;
                die($output);
                die($message);
            }else {
                $output = "Database Query Successfully: </br>";
            }
        }

        public function removeHTMLSpecialChar($value) {
            return htmlspecialchars($value, ENT_QUOTES);
        }

        public function removeHTMLEntities($value) {
            return htmlentities($value, ENT_QUOTES);
        }

        public function HTMLEntitiesDecoding($value) {
            return html_entity_decode($value, ENT_QUOTES | ENT_HTML5);
        }

        public function URLEncoding($value) {
            return urlencode($value);
        }

        public function URLDecoding($value) {
            return urldecode($value);
        }

        public function escapeValues($value) {
            if($this->real_escape_string_exists) {
                if($this->magic_quotes_active) {
                    $value = stripcslashes($value);
                }
                $value = mysqli_real_escape_string($this->connection, $value);
            }else {
                if($this->magic_quotes_active) {
                    $value = addsclashes($value);
                }
            }
            return htmlentities($value);
        }

        

        public function fetchArray($result_set) {
            if(!$result_set) {
                die("No result that match your query");
            }
            return mysqli_fetch_array($result_set, MYSQLI_ASSOC);
        }

        public function numRows($result_set) {
            return mysqli_num_rows($result_set);
        }

        public function insertID() {
            return mysqli_insert_id($this->connection);
        }

        public function affectedRows() {
            return mysqli_affected_rows($this->connection);
        }
    }
    
    $DBInstance = new MySQLDatabase();
?>