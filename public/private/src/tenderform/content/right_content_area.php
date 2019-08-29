<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Publish, Update and Delete Document</h2>
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
            $requirementDocuments = RequirementDocument::getBySQL($result);
        ?>
        <div class="panel-body" id="document_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="requirement_document_edit_btn">
                    <div class="well">
                        <form action="actionfm.php" method="post">
                            <div class="form-group">
                                <label for="collapse_document_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_document_title" name="document_title" placeholder="Tilte">
                            </div>

                            <div class="form-group">
                                <label for="collapse_document_desc" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_document_desc" name="document_desc" rows="3" placeholder="Description..."></textarea>
                            </div>

                            <input type="hidden" id="collapse_document_filename" name="document_filename">
                            <input type="hidden" id="collapse_document_type" name="document_type">
                            <input type="hidden" id="collapse_document_size" name="document_size">

                            <div class="form-group">
                                <input type="hidden" id="collapse_document_id" name="document_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="requirement_document_update_btn" type="submit" name="update_document">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center">Filename</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($requirementDocuments as $requirementDocument): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><span class="glyphicon glyphicon-share-alt"></span></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->body); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->filename); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->type); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->size); ?></td>
                            <td class="">
                                <button type="button" id="requirement_requirement_document_edit_btn" class="btn btn-info btn-xs requirement-document-edit-btn" data-toggle="collapse" data-target="#requirement_document_edit_btn" aria-expanded="false" aria-controls="requirement_document_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="actionfm.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($requirementDocument->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
                        </tr>
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
                    <?php endif;?>                </div>
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
</div>
