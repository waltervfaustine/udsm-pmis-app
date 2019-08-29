<?php require_once("../../../../../../imports/autoload.php"); ?>
<?php $downloadDocumentURL = SITE_ROOT.DS.'public'.DS.'admin'.DS.'uploads'.DS.'documents'; ?>
<?php 
    if(empty($_GET['id'])) {
        $session->message("No Document to download!");
        redirect_to('../../requirement');
    }

    $requirementDocument = RequirementDocument::getByID($_GET['id']);
    
    if($requirementDocument) {
        if ($requirementDocument->downloadFile($downloadDocumentURL, $requirementDocument->filename)) {
            redirect_to('../../requirement');
        }else{
            $session->message("No Document to download!");
            redirect_to('../../requirement');
        }

    }else {
        $session->message("The Document could not be downloaded.");
    }

?>
<?php if(isset($database)) { $DBInstance->closeDBConnection(); } ?>