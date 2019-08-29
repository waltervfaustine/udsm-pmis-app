
<?php require_once("../../../../imports/autoload.php"); ?>

<?php $logfile = SITE_ROOT.DS.'public'.DS.'private'.DS.'log'.DS.'reg_log.txt'; ?>
<?php 

    global $session;
    if(isset($_GET['clr'])){
        if($_GET['clr'] == 'true'){
            file_put_contents($logfile, '');
            $systemuser = SystemUser::getByID($_SESSION['currentUID']);
            $session->message("Log file is successfully deleted by $systemuser->fname $systemuser->lname");
			clearRegLogAction("Logs Data Deletion", $_SESSION['currentRole'], $systemuser->phone, $systemuser->email, "Last time log was cleared By: $systemuser->fname $systemuser->lname");
            redirect_to('./index.php?pg=1');
        }
    }
?>