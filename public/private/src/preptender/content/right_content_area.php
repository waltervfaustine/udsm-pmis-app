<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Posted Tender Informations</h2>
    </div>
        <?php
            global $DBInstance;
            $page = TenderPosting::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = TenderPosting::getRecordPerPage();
            $total_count = TenderPosting::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderPosting::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderpostings = TenderPosting::getBySQL($result);
        ?>
        
        <div class="panel-body" id="user_requirement_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="tender_edit_btn">
                    <div class="well">
                        <form action="actionreq.php/index.php?pg=1" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="collapse_user_requirement_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_user_requirement_title" name="requirement_title" placeholder="Requirement Title">
                            </div>
                            <div class="form-group">
                                <label for="collapse_user_requirement_body" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_user_requirement_body" name="requirement_body" rows="3" placeholder="Requirement Description"></textarea>
                            </div>
                            <input type="hidden" id="collapse_user_requirement_filename" name="user_requirement_filename">
                            <input type="hidden" id="collapse_user_requirement_type" name="user_requirement_type">
                            <input type="hidden" id="collapse_user_requirement_size" name="user_requirement_size">
                            <div class="hidden form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <label class="input-group-text" for="collapse_user_requirement_status">Requirement Status</label>
                                    </span>
                                    <select class="form-control" id="collapse_user_requirement_status" name="user_requirement_status">
                                        <option selected>Choose...</option>
                                        <option value="approved">Approve</option>
                                        <option value="unapproved">Unapprove</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="collapse_user_requirement_timestamp" name="user_requirement_timestamp">
                            <input type="hidden" id="collapse_user_requirement_requesterid" name="user_requirement_requesterid">
                            <div class="form-group">
                                <input type="hidden" id="collapse_user_requirement_id" name="requirement_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" type="submit" id="user_requirement_update_btn" name="update_user_requirement">Update Requirement Info</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center">Status</th>
                        <th class="info text-center">Posted On</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach($tenderpostings as $tenderposting): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->body); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->filename); ?></td>
                            <?php if($tenderposting->status == 'unapproved'): ?>
                                <td class="text-center"><button type="button" id="" class="btn btn-warning btn-xs"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></button></td>
                            <?php else: ?>
                                <td class="text-center"><button type="button" id="" class="btn btn-success btn-xs"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></button></td>
                            <?php endif; ?>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->requesterid); ?></td>
                            <td class="text-center"><?php echo date("d-m-Y h:i:sa", $DBInstance->HTMLEntitiesDecoding($tenderposting->timestamp)); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->type); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->size); ?></td>
                            <?php if($tenderposting->status == "approved"): ?>
                                <td class="text-center">
                                <button type="button" id="tender_edit_btn" class="btn btn-info btn-xs user-requirement-edit-btn disabled" data-toggle="collapse" aria-expanded="false">
                                    Edit Info
                                </button>
                                </td>
                                <td class="text-center disabled"><a class="disabled"><button type="button" class="btn btn-danger btn-xs disabled">Delete Info</button></a></td>
                            <?php elseif($tenderposting->status == "unapproved"): ?>
                                <td class="text-center">
                                <button type="button" id="tender_edit_btn" class="btn btn-info btn-xs user-requirement-edit-btn" data-toggle="collapse" data-target="#1tender_edit_btn" aria-expanded="false" aria-controls="1tender_edit_btn">
                                    Edit Info
                                </button>
                                </td>
                                <td class="text-center"><a href="actionpreptend.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
                            <?php endif; ?>
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
</div>
