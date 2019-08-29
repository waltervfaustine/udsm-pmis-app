<?php require_once("../../../../imports/autoload.php"); ?>

<?php $requirementforms = RequirementDocument::getAll(); ?>

<div class="panel panel-default">
    <div class="panel-heading">
    <h2 class="panel-title">Document For Tender Issues From PPRA</h2>
</div>
    <?php
        global $DBInstance;
        $page = RequirementDocument::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
        $per_page = RequirementDocument::getRecordPerPage();
        $total_count = RequirementDocument::getCountAll();
    ?>
    <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
    <?php
        $result = RequirementDocument::findRecordsForThisPage($per_page, $pagination->getOffset());
        $requirementforms = RequirementDocument::getBySQL($result);
    ?>
    
    <div class="panel-body" id="tender_status_content_area">
        <table class="table table-bordered table-hover">
            <div class="collapse" id="tender_application_awarding">
            </div>
            <thead>
                <tr>
                    <th class="info"><span class="glyphicon glyphicon-list-alt"></span></th>
                    <th class="info">Title</th>
                    <th class="info text-center">Poster</th>
                    <th class="info text-center">Time</th>
                    <th class="info text-center"><span class="glyphicon glyphicon-download"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach($requirementforms as $requirementform): ?>
                    <?php global $DBInstance; ?>
                    <tr>
                        <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                        <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->title); ?></td>
                        <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->body); ?></td>

                        <?php $systemuser = SystemUser::getByID($requirementform->posteruid);?>

                        <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($systemuser->fname." ".$systemuser->lname); ?></td>
                        <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->tenderid); ?></td>
                        <td class="text-center"><?php echo date("l jS \of F Y h:i:s A", $DBInstance->HTMLEntitiesDecoding($requirementform->timestamp)); ?></td>
                        <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->type); ?></td>
                        <td class="text-center"><a class="btn btn-warning btn-xs" href="download.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($requirementform->id); ?>" role="button">Download</a></td>
                    </tr>
                    <?php $counter = $counter + 1; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <ul class="pagination">
                <?php 
                    if($pagination->totalPage() > 1) {
                        if($pagination->hasPreviousPage()) {
                            echo "<li class=\"disabled\">";
                            echo "<a href=\"index.php?pg=";
                            echo $pagination->getPreviousPage();
                            echo "\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>";
                            echo "</li>";
                        }

                        for($i = 1; $i <= $pagination->totalPage(); $i++) {
                            if($i == $page) {
                                echo "<li class=\"active\">";
                                echo "<span aria-hidden=\"true\">";
                                echo "{$i}";
                                echo "</span>";
                                echo "</li>";
                            }else {
                                echo "<li class=\"\">";
                                echo "<a href=\"index.php?pg=";
                                echo "{$i}";
                                echo "\">";
                                echo "<span aria-hidden=\"true\">";
                                echo "{$i}";
                                echo "</span>";
                                echo "</a>";
                                echo "</li>";
                            }
                        }
                        
                        if($pagination->hasNextPage()) {
                            echo "<li class=\"disabled\">";
                            echo "<a href=\"index.php?pg=";
                            echo $pagination->getNextPage();
                            echo "\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>";
                            echo "</li>";
                        }
                    }
                ?>
            </ul>
                    <?php if($total_count == 0): ?>
                    <p><?php echo "Oops! Currently No result found!  <strong>".$total_count." item returned.</strong>"; ?></p>
                <?php elseif($total_count >= 1):?>
                    <p><?php echo "Showing ".$pagination->getFirstItem()." to ".$pagination->getLastItem() ." of ".$total_count." entries."; ?></p>
                <?php endif;?>             
            </div>
        <nav aria-label="...">
            <ul class="pager">
                <?php 
                    if($pagination->totalPage() > 1) {
                        if($pagination->hasPreviousPage()) {
                            echo "<li class=\"previous\">";
                            echo "<a href=\"index.php?pg=";
                            echo $pagination->getPreviousPage();
                            echo "\"><span aria-hidden=\"true\">&larr;</span> Older</a>";
                            echo "</li>";
                        }
                        
                        if($pagination->hasNextPage()) {
                            echo "<li class=\"next\">";
                            echo "<a href=\"index.php?pg=";
                            echo $pagination->getNextPage();
                            echo "\"><span aria-hidden=\"true\">&rarr;</span> Newer</a>";
                            echo "</li>";
                        }
                    }
                ?>
            </ul>
        </nav>
    </div>
</div>

