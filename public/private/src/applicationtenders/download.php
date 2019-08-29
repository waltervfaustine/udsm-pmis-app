<?php require_once("../../../../imports/autoload.php"); ?>
<?php $downloadDocumentURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.'awarding_letter'; ?>
<?php 
    if(empty($_GET['id'])) {
        redirect_to("../applicationtenders/index.php?pg=1");
    }

    $tenderApplication = TenderApplication::getByID($_GET['id']);
    
    if($tenderApplication) {
        if ($tenderApplication->downloadFile($downloadDocumentURL, $tenderApplication->award)) {
            $session->message("Download Started for the document $tenderApplication->award ");
            redirect_to("../applicationtenders/index.php?pg=1");
        }else{
            $session->message("No Document to download!");
            redirect_to("../applicationtenders/index.php?pg=1");
        }

    }else {
        $session->message("The Document could not be downloaded.");
        redirect_to("../applicationtenders/index.php?pg=1");
    }

?>
<?php if(isset($database)) { $DBInstance->closeDBConnection(); } ?>