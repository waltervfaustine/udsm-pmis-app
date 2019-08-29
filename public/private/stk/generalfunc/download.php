<?php require_once("../../../../imports/autoload.php"); ?>
<?php $downloadDocumentURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.'tender_application_doc'; ?>
<?php 
    if(empty($_GET['id'])) {
        redirect_to("./");
    }

    $tenderApplicationDoc = TenderApplication::getByID($_GET['id']);
    if($tenderApplicationDoc) {
        if ($tenderApplicationDoc->downloadFile($downloadDocumentURL, $tenderApplicationDoc->filename)) {
            $session->message("Download Started for the document $tenderApplicationDoc->filename ");
            redirect_to("./");
        }else{
            $session->message("No Document to download!");
            redirect_to("./");
        }

    }else {
        $session->message("The Document could not be downloaded.");
    }

?>
<?php if(isset($database)) { $DBInstance->closeDBConnection(); } ?>