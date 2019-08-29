<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Tender Applications You Have Applied </h2>
    </div>
        <?php
            global $DBInstance;
            $page = TenderApplication::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = TenderApplication::getRecordPerPage();
            $total_count = TenderApplication::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderApplication::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderApplications = TenderApplication::getBySQL($result);
        ?>
        
        <div class="panel-body" id="tender_status_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="tender_application_awarding">
                    <div class="well">
                        <form action="actiontendstatus.php/index.php?pg=1" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="unapproved_tender_status">Award Tender Winner</label></span>
                                        <select class="form-control" id="unapproved_tender_status" name="unapproved_tender_status">
                                            <option selected>Choose...</option>
                                            <option value="true">Award</option>
                                            <option class="false" value="unapproved">Remove Award</option>
                                        </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right" id="update_tender_status_btn" type="submit" name="update_unapproved_status">Click Here To Award Tender Winner</button>
                                    </span>
                                </div> -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><label class="input-group-text" for="collapse_assigning_winning">Assigning Tender Winner</label></span>
                                            <select class="form-control" id="collapse_assigning_winning" name="collapse_assigning_winning">
                                                <option selected>Choose...</option>
                                                <option value="false" >Not A winner</option>
                                                <option class="" value="true">Winner</option>
                                                <?php foreach($listofcommittees as $listofcommittee): ?>
                                                    <option value="<?php echo $listofcommittee->id; ?>"> <?php echo $listofcommittee->name; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <span class="input-group-btn">
                                        <button class="btn btn-primary pull-right" id="assign_committee_membership_btn" type="submit" name="assign_tender_winner">Assigning Winning Status</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="collapse_tender_applicationid" name="collapse_tender_applicationid">
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="awarding_letter_document" class="input-group-btn">
                                            <span class="btn btn-primary">
                                                Browse&hellip; <input id="awarding_letter_document" type="file" name="awarding_letter_document" style="display: none;" multiple>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <button class="btn btn-primary pull-right" id="assign_board_membership_btn" type="submit" name="submit_awarding_letter">Sending Awarding Letter To Winner</button>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <button class="btn btn-danger pull-right" id="assign_board_membership_btn" type="submit" name="remove_awarding_letter">Remove Awarding To The Tenderer</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="collapse_boatender_id" name="collapse_boatender_id">
                                </div>
                            </div>
                            <input type="hidden" id="collapse_user_requirement_timestamp" name="user_requirement_timestamp">
                            <input type="hidden" id="collapse_user_requirement_requesterid" name="user_requirement_requesterid">
                            <div class="form-group">
                                <input type="hidden" id="collapse_user_requirement_id" name="requirement_id">
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Comment</th>
                        <th class="info text-center">ApplicationTimestamp</th>
                        <th class="info text-center">ApplicationDoc</th>
                        <th class="info text-center">WinningStatus</th>
                        <th class="info text-center">AwardingStatus</th>
                        <!-- <th class="info"><span class="glyphicon glyphicon-edit"></span></th> -->
                        <!-- <th class="info"><span class="glyphicon glyphicon-remove"></span></th> -->
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($tenderApplications as $tenderApplication): ?>
                    <?php global $DBInstance; ?>
                        <?php $tenders = TenderPosting::getByID($tenderApplication->tenderid); ?>
                        <?php if($_SESSION['currentRole'] == "UDSM Employee"): ?>
                            <tr>
                                <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->id); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->comment); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->stakeholderid); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->status); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->tenderid); ?></td>
                                <td class="text-center"><?php echo date("l jS \of F Y h:i:s A", $DBInstance->HTMLEntitiesDecoding($tenderApplication->timestamp)); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->type); ?></td>
                                <td class="hidden text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->size_as_text($tenderApplication->size)); ?></td>
                                <td class="hidden text-center"><a class="btn btn-primary btn-sm" href="download.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->id); ?>" role="button">Download</a></td>

                                <?php if($tenderApplication->status == 'false'): ?>
                                    <td class="text-center"><button class="btn btn-danger btn-sm">Not Yet Winner</button></td>
                                <?php elseif($tenderApplication->status == 'true'): ?>
                                    <td class="text-center"><button class="btn btn-success btn-sm">You Are The Winner</button></td>
                                <?php endif; ?>

                                <?php if($tenderApplication->award == 'false' && $tenderApplication->status == 'false'): ?>
                                    <td class="text-center"><button class="btn btn-info btn-sm">Not Awarded</button></td>
                                    <td class="text-center"><button class="btn btn-info btn-sm">No Awarding Letter</button></td>
                                <?php elseif($tenderApplication->award == 'false' && $tenderApplication->status == 'true'): ?>
                                    <td class="text-center"><button class="btn btn-info btn-sm">Winner Awarded</button></td>
                                    <td class="text-center"><button class="btn btn-info btn-sm">No Awarding Letter</button></td>
                                <?php elseif($tenderApplication->award != 'false' && $tenderApplication->status == 'true'): ?>
                                    <td class="text-center"><button class="btn btn-success btn-sm">Awarded Tender Winning</button></td>
                                    <td class="text-center"><a href="download.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->id); ?>"><button class="btn btn-info btn-sm">Download Award Letter</button></a></td>
                                <?php endif; ?>

                                <td class="hidden">
                                    <button type="" class="btn btn-primary btn-xs center-block winning_status_tender_edit_btn" data-toggle="collapse" data-target="#tender_application_awarding" aria-expanded="false" aria-controls="tender_application_awarding">
                                        Update Tender Info
                                    </button>
                                </td>
                        
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->id); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->comment); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->stakeholderid); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->status); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->tenderid); ?></td>
                                <td class="text-center"><?php echo date("l jS \of F Y h:i:s A", $DBInstance->HTMLEntitiesDecoding($tenderApplication->timestamp)); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->type); ?></td>
                                <td class="hidden text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->size_as_text($tenderApplication->size)); ?></td>
                                <td class="text-center"><a class="btn btn-primary btn-sm" href="download.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->id); ?>" role="button">Download</a></td>

                                <?php if($tenderApplication->status == 'false'): ?>
                                    <td class="text-center"><button class="btn btn-danger btn-sm">Not Yet Winner</button></td>
                                <?php elseif($tenderApplication->status == 'true'): ?>
                                    <td class="text-center"><button class="btn btn-success btn-sm">Winner Is Selected</button></td>
                                <?php endif; ?>

                                <?php if($tenderApplication->award == 'false' && $tenderApplication->status == 'false'): ?>
                                    <td class="text-center"><button class="btn btn-info btn-sm">Not Awarded</button></td>
                                    <td class="text-center"><button class="btn btn-info btn-sm">No Awarding Letter</button></td>
                                <?php elseif($tenderApplication->award == 'false' && $tenderApplication->status == 'true'): ?>
                                    <td class="text-center"><button class="btn btn-info btn-sm">Winner Awarded</button></td>
                                    <td class="text-center"><button class="btn btn-info btn-sm">No Awarding Letter</button></td>
                                <?php elseif($tenderApplication->award != 'false' && $tenderApplication->status == 'true'): ?>
                                    <td class="text-center"><button class="btn btn-success btn-sm">Awarded Tender Winning</button></td>
                                    <td class="text-center"><a href="download.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderApplication->id); ?>"><button class="btn btn-info btn-sm">Download Award Letter</button></a></td>
                                <?php endif; ?>

                                <td class="">
                                    <button type="" class="btn btn-primary btn-xs center-block winning_status_tender_edit_btn" data-toggle="collapse" data-target="#tender_application_awarding" aria-expanded="false" aria-controls="tender_application_awarding">
                                        Update Tender Info
                                    </button>
                                </td>
                        
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
