<?php

    if(!(defined("DS") && defined("SITE_ROOT") && defined("LIB_PATH"))) {
        define("DS", DIRECTORY_SEPARATOR);
        define("DOCUMENT_ROOT", "C:".DS."xampp".DS."htdocs");
        define('SITE_ROOT', DOCUMENT_ROOT.DS.'pmis'); 
        define('LIB_PATH', SITE_ROOT.DS.'imports');   
        define('INCLUDES_PATH', SITE_ROOT.DS.'includes');   

    }
    require_once(LIB_PATH.DS."configuration.php");
    require_once(LIB_PATH.DS."miscellaneous.php");
    require_once(LIB_PATH.DS."dbdml.php");
    require_once(LIB_PATH.DS."dboperation.php");
    require_once(LIB_PATH.DS."session.php");
    require_once(LIB_PATH.DS."photograph.php");
    require_once(LIB_PATH.DS."crypt.php");
    require_once(LIB_PATH.DS."sysuser.php");
    require_once(LIB_PATH.DS."story.php");
    require_once(LIB_PATH.DS."role.php");
    require_once(LIB_PATH.DS."news.php");
    require_once(LIB_PATH.DS."committee.php");
    require_once(LIB_PATH.DS."tender_category.php");
    require_once(LIB_PATH.DS."tender_posting.php");
    require_once(LIB_PATH.DS."requirement_forms.php");
    require_once(LIB_PATH.DS."pagination.php");
    require_once(LIB_PATH.DS."department.php");
    require_once(LIB_PATH.DS."stakeholders_trans.php");
    require_once(LIB_PATH.DS."identification_card.php");
    require_once(LIB_PATH.DS."business_category.php");
    require_once(LIB_PATH.DS."user_requirement.php");
    require_once(LIB_PATH.DS."tenderboard.php");
    require_once(LIB_PATH.DS."tender_application.php");
    require_once(LIB_PATH.DS."tender_stage.php");
    require_once(LIB_PATH.DS."tender_progress_update.php");
    require_once(LIB_PATH.DS."committeeboardmembers.php");
    require_once(LIB_PATH.DS."stakeholder.php");

?>