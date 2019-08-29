<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">On Going UDSM Procurement Tenders</h2>
    </div>
        <?php
            global $DBInstance;
            if($_GET['pg'] == 1) {
                $page = 2;
            }else {
                $page = $_GET['pg'];
            }
            $page = TenderPosting::getPage($DBInstance->escapeValues(trim($page)));
            $per_page = TenderPosting::getRecordPerPage();
            $total_count = TenderPosting::getCountAllOnGoing();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderPosting::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderpostings = TenderPosting::getBySQL($result);
        ?>
        
        <div class="panel-body" id="ongoing_status_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="ongoing_tender_info_btn">
                    <div class="well">
                        <form action="actiontndrlist.php?pg=1" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="ongoing_tender_status">Update Tender Status</label></span>
                                        <select class="form-control" id="ongoing_tender_status" name="ongoing_tender_status">
                                            <option selected>Choose...</option>
                                            <option value="closed">Close</option>
                                            <option class="hidden" value="ongoing">Ongoing</option>
                                        </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right" id="update_tender_status_btn" type="submit" name="update_ongoing_status">Update Tender Status</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="ongoing_tender_id" name="ongoing_tender_id">
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center">PostedSince</th>
                        <th class="info text-center">Status</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tenderpostings as $tenderposting): ?>
                    <?php global $DBInstance; ?>
                        <?php if($tenderposting->status == "ongoing"): ?>
                            <tr>
                                <td class="text-center"><span class="glyphicon glyphicon-share-alt"></span></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->title); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->body); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->computeTime($tenderposting->timestamp)); ?></td>
                                <td class="hidden text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->size_as_text($tenderposting->size)); ?></td>
                                <?php
                                    echo "<td class=\"\"text-center>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-success btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status);
                                    echo "</button>";
                                    echo "</td>";
                                ?>

                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></td>
                                <td class="">
                                    <button type="butongoing" class="btn btn-info btn-xs center-block ongoing_tender_edit_btn" data-toggle="collapse" data-target="#ongoing_tender_info_btn" aria-expanded="false" aria-controls="ongoing_tender_info_btn">
                                        View More Info
                                    </button>
                                </td>
                                <td class=""><a href="actionnw.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?>"><button type="button" class="btn btn-danger btn-xs center-block">Delete Info</button></a></td>
                            </tr>
                        <?php endif; ?>
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
                <?php endif;?>            </div>
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


<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Closed Procurement Tenders</h2>
    </div>
        <?php
            global $DBInstance;
            if($_GET['pg'] == 1) {
                $page = 2;
            }else {
                $page = $_GET['pg'] = 1;
            }
            $page = TenderPosting::getPage($DBInstance->escapeValues(trim($page)));
            $per_page = TenderPosting::getRecordPerPage();
            $total_count = TenderPosting::getCountAllClosed();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderPosting::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderpostings = TenderPosting::getBySQL($result);
        ?>
        
        <div class="panel-body" id="close_tender_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="closed_tender_collapse_btn">
                    <div class="well">
                        <form action="actiontndrlist.php?pg=1" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="close_tender_id">Update Tender Status</label></span>
                                        <select class="form-control" id="closed_tender_status" name="closed_tender_status">
                                            <option selected>Choose...</option>
                                            <option value="closed">Close</option>
                                            <!-- <option value="ongoing">Ongoing</option> -->
                                        </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right" id="update_tender_status_btn" type="submit" name="close_tender_status">Update Tender Status</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="close_tender_id" name="close_tender_id">
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center">PostedSince</th>
                        <th class="info text-center">Status</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tenderpostings as $tenderposting): ?>
                    <?php global $DBInstance; ?>
                        <?php if($tenderposting->status == "closed"): ?>
                            <tr>
                                <td class="text-center"><span class="glyphicon glyphicon-share-alt"></span></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->title); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->body); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->computeTime($tenderposting->timestamp)); ?></td>
                                <td class="hidden text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->size_as_text($tenderposting->size)); ?></td>
                                <?php
                                    echo "<td class=\"\"text-center>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-warning btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status);
                                    echo "</button>";
                                    echo "</td>";
                                ?>

                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></td>
                                <td class="">
                                    <button type="button" id="closed_tender_edit_btn" class="btn btn-info btn-xs center-block closed_tender_edit_btn" data-toggle="collapse" data-target="#closed_tender_collapse_btn" aria-expanded="false" aria-controls="closed_tender_collapse_btn">
                                        View More Info
                                    </button>
                                </td>
                                <td class=""><a href="actiontndrlist.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?>"><button type="button" class="btn btn-danger btn-xs center-block">Delete Info</button></a></td>
                            </tr>
                        <?php endif; ?>
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
                <?php endif;?>            </div>
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