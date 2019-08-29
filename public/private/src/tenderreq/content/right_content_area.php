<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Requirement Form Data</h2>
    </div>
        <?php
            global $DBInstance;
            $page = UserRequirement::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = UserRequirement::getRecordPerPage();
            $total_count = UserRequirement::getCountMySubmittedRequirement($_SESSION['currentUID']);
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = UserRequirement::findRecordsForThisPage($per_page, $pagination->getOffset());
            $userRequirements = UserRequirement::getBySQL($result);
        ?>
        
        <div class="panel-body" id="user_requirement_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="user_requirement_edit_btn">
                    <div class="well">
                        <?php if($_SESSION['currentRole'] == "PMU Officer"): ?>
                            <form action="actionreq.php/index.php?pg=1" method="post" enctype="multipart/form-data">
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
                            </form>
                        <?php else: ?>
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
                        <?php endif; ?>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info">Title</th>
                        <th class="info">status</th>
                        <th class="info">Posted On</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach($userRequirements as $userRequirement): ?>
                        <?php if($userRequirement->requesterid == $_SESSION['currentUID']): ?>
                            <?php global $DBInstance; ?>
                            <tr>
                                <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->id); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->title); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->body); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->filename); ?></td>
                                <?php if($userRequirement->status == 'unapproved'): ?>
                                    <td class="text-center"><button type="button" id="" class="btn btn-warning btn-xs"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->status); ?></button></td>
                                <?php else: ?>
                                    <td class="text-center"><button type="button" id="" class="btn btn-success btn-xs"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->status); ?></button></td>
                                <?php endif; ?>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->requesterid); ?></td>
                                <td class="text-center"><?php echo date("d-m-Y h:i:sa", $DBInstance->HTMLEntitiesDecoding($userRequirement->timestamp)); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->type); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->size); ?></td>
                                <?php if($userRequirement->status == "approved"): ?>
                                    <td class="text-center">
                                    <button type="button" id="user_requirement_edit_btn" class="btn btn-info btn-xs user-requirement-edit-btn disabled" data-toggle="collapse" aria-expanded="false">
                                        Edit Info
                                    </button>
                                    </td>
                                    <td class="text-center disabled"><a class="disabled"><button type="button" class="btn btn-danger btn-xs disabled">Delete Info</button></a></td>
                                <?php elseif($userRequirement->status == "unapproved"): ?>
                                    <td class="text-center">
                                    <button type="button" id="user_requirement_edit_btn" class="btn btn-info btn-xs user-requirement-edit-btn" data-toggle="collapse" data-target="#user_requirement_edit_btn" aria-expanded="false" aria-controls="user_requirement_edit_btn">
                                        Edit Info
                                    </button>
                                    </td>
                                    <td class="text-center"><a href="actionreq.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($userRequirement->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
                                <?php endif; ?>
                            </tr>
                        <?php endif; ?>
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
                    <?php endif;?>              </div>
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
