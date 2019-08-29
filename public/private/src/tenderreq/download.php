<?php require_once("../../../../imports/autoload.php"); ?>
<?php $downloadDocumentURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'files'.DS.'requirement_forms'; ?>
<?php 
    if(empty($_GET['id'])) {
        redirect_to("../tenderform/");
    }

    $requirementDocument = RequirementDocument::getByID($_GET['id']);
    
    if($requirementDocument) {
        if ($requirementDocument->downloadFile($downloadDocumentURL, $requirementDocument->filename)) {
            $session->message("Download Started for the document $requirementDocument->filename ");
            redirect_to("../tenderform/");
        }else{
            $session->message("No Document to download!");
            redirect_to("../tenderform/");
        }

    }else {
        $session->message("The Document could not be downloaded.");
    }

?>
<?php if(isset($database)) { $DBInstance->closeDBConnection(); } ?>