<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        global $DBInstance;
        if(isset($_GET['uid']) && isset($_GET['reqid'])) {
            if(!empty($_GET['uid']) && !empty($_GET['reqid'])) {
                echo $_SESSION['requesteruid'] = htmlentities($DBInstance->escapeValues($_GET['uid']));
                echo $_SESSION['requirementuid'] = htmlentities($DBInstance->escapeValues($_GET['reqid']));
                redirect_to("../preptender/index.php?pg=1");
            }else {
                redirect_to("../preptender/index.php?pg=1");
            }
        }
    }
?>