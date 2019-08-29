<?php require_once("../../../../imports/autoload.php"); ?>
<?php $downloadDocumentURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.'tender_documentation'; ?>
<?php 
    if(empty($_GET['id'])) {
        redirect_to("./");
    }

    $tenderpostingdoc = TenderPosting::getByID($_GET['id']);
    if($tenderpostingdoc) {
        if ($tenderpostingdoc->downloadFile($downloadDocumentURL, $tenderpostingdoc->filename)) {
            $session->message("Download Started for the document $tenderpostingdoc->filename ");
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