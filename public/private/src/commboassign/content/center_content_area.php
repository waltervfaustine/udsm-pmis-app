<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">On Going Procurement Tenders</h2>
    </div>
        <?php
            global $DBInstance;
            $page = TenderPosting::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = TenderPosting::getRecordPerPage();
            $total_count = TenderPosting::getCountAllApprovedAndOnGoing();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderPosting::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderpostings = TenderPosting::getBySQL($result);
        ?>
        
        <div class="panel-body" id="assignacommboard_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="assignacommboard_tender_info_btn">
                    <div class="well">
                        <form action="actionassigncomboa.php?pg=1" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="collapse_commid">Assign Committee To Tender</label></span>
                                        <?php $listofcommittees = Committee::getAll(); ?>
                                        <select class="form-control" id="collapse_commid" name="collapse_commid">
                                            <option selected>Choose...</option>
                                            <option value="-1" >Not Assigned</option>
                                            <option class="hidden" value="-1" selected>Not Assigned Any Committee</option>
                                            <?php foreach($listofcommittees as $listofcommittee): ?>
                                                <option value="<?php echo $listofcommittee->id; ?>"> <?php echo $listofcommittee->name; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right" id="assign_committee_membership_btn" type="submit" name="assign_committee_to_tender">Assign Committee</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_commtender_id" name="collapse_commtender_id">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="collapse_boaid">Assign Tender Board To Tender</label></span>
                                        <?php $TenderBoards = TenderBoard::getAll(); ?>
                                        <select class="form-control" id="collapse_boaid" name="collapse_boaid">
                                            <option selected>Choose...</option>
                                            <option value="-1" >Not Assigned</option>
                                            <option class="hidden" value="-1" selected>Not Assigned Any Tender Board</option>
                                            <?php foreach($TenderBoards as $TenderBoard): ?>
                                            <option value="<?php echo $TenderBoard->id; ?>"> <?php echo $TenderBoard->name; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right" id="assign_board_membership_btn" type="submit" name="assign_board_to_tender">Assign Tender Board</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_boatender_id" name="collapse_boatender_id">
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center">PostedSince</th>
                        <!-- <th class="info text-center">Document</th> -->
                        <th class="info text-center">Status</th>
                        <th class="info text-center">Committee</th>
                        <th class="info text-center">Board</th>
                        <!-- <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th> -->
                        <!-- <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach($tenderpostings as $tenderposting): ?>
                    <?php global $DBInstance; ?>
                        <?php if($tenderposting->status == "approved" || $tenderposting->status == "ongoing"): ?>
                            <tr>
                                <td class="text-center"><span class="glyphicon glyphicon-share-alt"></span></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->committeeid); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->boardid); ?></td>
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

                                <?php if($tenderposting->committeeid == '-1'): ?>
                                    <td class=""><button type="button" class="btn btn-danger btn-xs text-center">Not Assigned</button></a></td>
                                <?php else: ?>
                                    <?php $assigned_committee = Committee::getByID($tenderposting->committeeid); ?>
                                    <td class=""><button type="button" class="btn btn-primary btn-xs text-center"><?php echo $DBInstance->escapeValues($assigned_committee->name); ?></button></a></td>
                                <?php endif; ?>

                                <?php if($tenderposting->boardid == '-1'): ?>
                                    <td class=""><button type="button" class="btn btn-warning btn-xs text-center">Not Assigned</button></a></td>
                                <?php else: ?>
                                    <?php $assigned_board = TenderBoard::getByID($tenderposting->boardid); ?>
                                    <td class=""><button type="button" class="btn btn-warning btn-xs text-center"><?php echo $DBInstance->escapeValues($assigned_board->name); ?></button></a></td>
                                <?php endif; ?>

                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->status); ?></td>
                                <!-- <td class="">
                                    <button type="" class="btn btn-info btn-xs center-block assignacommboard_tender_edit_btn" data-toggle="collapse" data-target="#assignacommboard_tender_info_btn" aria-expanded="false" aria-controls="assignacommboard_tender_info_btn">
                                        View More Info
                                    </button>
                                </td> -->
                                <!-- <td class=""><a href="actionassigncomboa.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderposting->id); ?>"><button type="button" class="btn btn-danger btn-xs center-block">Delete Info</button></a></td> -->
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

