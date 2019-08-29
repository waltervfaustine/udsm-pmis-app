<?php require_once("../../../../../imports/autoload.php"); ?>

<?php 
    $requirementforms = RequirementDocument::getAll();
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Download Tender Requirement Form</h3>
  </div>
    <?php foreach($requirementforms as $requirementform): ?>
        <div class="panel-body">
            <div class="jumbotron">
            <?php global $DBInstance; ?>
                <b><h2><?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->title); ?></h2></b>
                <p><?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->body); ?></p>
                <p><a class="btn btn-primary btn-sm" href="download/index.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->id); ?>" role="button">Download Requirement Form </a></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

