<?php require_once("../../../../imports/autoload.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        global $DBInstance;
        if(isset($_GET['tendid']) && isset($_GET['stkid'])) {
            if(!empty($_GET['tendid']) && !empty($_GET['stkid'])) {
                echo $_SESSION['appliedtenderid'] = htmlentities($DBInstance->escapeValues($_GET['tendid']));
                echo $_SESSION['stakeholderuid'] = htmlentities($DBInstance->escapeValues($_GET['stkid']));
                redirect_to("../applytender/index.php?pg=1");
            }else {
                redirect_to("../applytender/index.php?pg=1");
            }
        }
    }
?>