<?php require_once("../../../../imports/autoload.php"); ?>
<?php $downloadDocumentURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.'requirement_doc'; ?>
<?php 
    if(empty($_GET['id'])) {
        redirect_to("../reqdetails/index.php?pg=1");
    }

    $userRequirement = UserRequirement::getByID($_GET['id']);
    
    if($userRequirement) {
        if ($userRequirement->downloadFile($downloadDocumentURL, $userRequirement->filename)) {
            $session->message("Download Started for the document $userRequirement->filename ");
            redirect_to("../reqdetails/index.php?pg=1");
        }else{
            $session->message("No Document to download!");
            redirect_to("../reqdetails/index.php?pg=1");
        }

    }else {
        $session->message("The Document could not be downloaded.");
        redirect_to("../reqdetails/index.php?pg=1");
    }

?>
<?php if(isset($database)) { $DBInstance->closeDBConnection(); } ?>