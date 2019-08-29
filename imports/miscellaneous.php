<?php

    function is_document($file) {
        $flag = "";
        $imageMimeTypes = array('application/pdf', 'doc', 'docx');
        $fileMimeType = mime_content_type($file);
        if(in_array($fileMimeType, $imageMimeTypes)) {
            $flag = true;
        }else {
            $flag = false;
        }
        return $flag;
    }

    function is_word_document($filename) {
        $imageMimeTypes = array('doc', 'docx');
        $fileMimeType = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($fileMimeType, $imageMimeTypes)) {
            return true;
        }else {
            return false;
        }
    }
    
    // function is_word_document($file) {
    //     $fileinfo = new SplFileInfo($file);
    //     $imageMimeTypes = array('.doc');
    //     $fileMimeType = $fileinfo->getExtension();
    //     if(in_array($fileMimeType, $imageMimeTypes)) {
    //         $flag = true;
    //     }else {
    //         $flag = false;
    //     }
    //     return $flag;
    // }

    function is_image($file) {
        $imageMimeTypes = array('image/png', 'image/gif', 'image/jpeg');
        $fileMimeType = mime_content_type($file);
        if(in_array($fileMimeType, $imageMimeTypes)) {
            return true;
        }else {
            return false;
        }
    }

    function strip_zeros_from_date($marked_string=""){
        $no_zeros = str_replace('*0', '', $marked_string);
        $cleaned_string = str_replace('*', '', $no_zero);
        return $cleaned_string;
    }

    function redirect_to($location = NULL){
        if($location != NULL){
            header("Location: {$location}");
            exit;
        }
    }

    function output_message($message=""){
        if(!empty($message)){
            return "<p class=\"message\">{$message}</p>";
        }else {
            return "";
        }
    }

    function fullname($fname, $lname) {
        return $fname." ".$lname;
    }

    function __autoload($class_name){
        $class_name = strtolower($class_name);
        $path = LIB_PATH.DS."imports/{$class_name}.php";
        if(file_exists($path)){
            require_once($path);
        }else{
            die("The file {$class_name}.php could not be found.");
        }
    }

    // function include_layout_template($template="") {
    //     include(SITE_ROOT.DS.'public'.DS.'layout'.DS.$template);
    // }

    function include_layout_template($emplateLOC="", $templateURL="") {
        include($emplateLOC.DS.$templateURL);
    }

    function include_layout_template_admin($template="") {
        include(SITE_ROOT.DS.'public'.DS.'admin'.DS.'layout'.DS.$template);
    }

    function timeAgo($time) {
        $timediff = time() - $time;   
        
        if ($timediff < 1){
            return '0 seconds';
        }

        $timemessages = array( 
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($timemessages as $timemessage => $str){
            $d = $timediff / $timemessage;
            if ($d >= 1){
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
            }
        }
    }

    
    function registerLogAction($action, $role, $phone, $email, $status, $gender, $message=""){
        $logfile = SITE_ROOT.DS.'public'.DS.'private'.DS.'log'.DS.'reg_logs.txt';
        $new = file_exists($logfile) ? false : true;
        
        if($handle = fopen($logfile, 'a')){
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
            $timestamp = date("l jS \of F Y h:i:s A", time());
            $ago = timeAgo(time());
            $content = "{$timestamp} | {$action} | {$role} | {$message} | {$gender} | {$status} | {$phone} | {$email}\n";
            fwrite($handle, $content);
            fclose($handle);
            if($new){
                chmod($logfile, 0755);
            }
        }else {
            echo "Could not open log file for writing";
        }
    }

    function loginLogAction($action, $role, $phone, $email, $status, $gender, $message=""){
        $logfile = SITE_ROOT.DS.'public'.DS.'private'.DS.'log'.DS.'login_logs.txt';
        $new = file_exists($logfile) ? false : true;
        
        if($handle = fopen($logfile, 'a')){
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
            $timestamp = date("l jS \of F Y h:i:s A", time());
            $ago = timeAgo(time());
            $content = "{$timestamp} | {$action} | {$role} | {$message} | {$gender} | {$status} | {$phone} | {$email}\n";
            fwrite($handle, $content);
            fclose($handle);
            if($new){
                chmod($logfile, 0755);
            }
        }else {
            echo "Could not open log file for writing";
        }
    }

    function clearLoginLogAction($action, $role, $phone, $email, $message){
        $logfile = SITE_ROOT.DS.'public'.DS.'private'.DS.'log'.DS.'login_logs.txt';
        $new = file_exists($logfile) ? false : true;
        
        if($handle = fopen($logfile, 'a')){
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
            $timestamp = date("l jS \of F Y h:i:s A", time());
            $ago = timeAgo(time());
            $content = "{$timestamp} | {$action} | {$role} | {$phone} | {$email} | {$message}\n";
            fwrite($handle, $content);
            fclose($handle);
            if($new){
                chmod($logfile, 0755);
            }
        }else {
            echo "Could not open log file for writing";
        }
    }

    function clearRegLogAction($action, $role, $phone, $email, $message){
        $logfile = SITE_ROOT.DS.'public'.DS.'private'.DS.'log'.DS.'reg_log.txt';
        $new = file_exists($logfile) ? false : true;
        
        if($handle = fopen($logfile, 'a')){
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
            $timestamp = date("l jS \of F Y h:i:s A", time());
            $ago = timeAgo(time());
            $content = "{$timestamp} | {$action} | {$role} | {$phone} | {$email} | {$message}\n";
            fwrite($handle, $content);
            fclose($handle);
            if($new){
                chmod($logfile, 0755);
            }
        }else {
            echo "Could not open log file for writing";
        }
    }

    function datetime_to_text($datetime="") {
        $unixdatetime = strtotime($datetime);
        return strftime("%B %d %Y at %I:%M %p", $unixdatetime);
    }

?>