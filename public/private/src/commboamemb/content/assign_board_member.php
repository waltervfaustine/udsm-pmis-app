
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">User Registered as Board Members</h2>
    </div>
        <?php
            global $DBInstance;
            $page = CommitteeBoardMembers::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = CommitteeBoardMembers::getRecordPerPage();
            $total_count = CommitteeBoardMembers::getCountAllCommittee();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = CommitteeBoardMembers::findRecordsForThisPage($per_page, $pagination->getOffset());
            $committees = CommitteeBoardMembers::getBySQL($result);
            
        ?>
        
        <div class="panel-body" id="boardmembers_approved_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="board_membership_edit_section">
                    <div class="well">
                        <form action="actioncommem.php?pg=1" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="collapse_board_id">Assign Member To A  Tender Board</label></span>
                                        <?php $TenderBoards = TenderBoard::getAll(); ?>
                                        <select class="form-control" id="collapse_board_id" name="collapse_board_id">
                                            <option selected>Choose...</option>
                                            <option value="-1">Not Assigned</option>
                                            <?php foreach($TenderBoards as $TenderBoard): ?>
                                            <option value="<?php echo $TenderBoard->id; ?>"> <?php echo $TenderBoard->name; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right" id="assign_board_membership_btn" type="submit" name="assign_board_member">Assign Membership</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_board_member_id" name="collapse_board_member_id">
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Firstname</th>
                        <th class="info text-center">Lastname</th>
                        <th class="info text-center">Email</th>
                        <th class="info text-center">phone</th>
                        <th class="info text-center">Gender</th>
                        <th class="info text-center">Role</th>
                        <th class="info text-center">Member Since</th>
                        <th class="info text-center">Board Name</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0; ?>
                    <?php foreach($committees as $committee): ?>
                    <?php global $DBInstance; ?>
                        <?php if($committee->role_name == "board"): ?>
                            <?php $counter = 1; ?>
                            <tr>
                                <td class="text-center"><span class="glyphicon glyphicon-hand-right"></span></td>
                                <td class="hidden"><?php echo $DBInstance->escapeValues($committee->id); ?></td>
                                <td class="hidden"><?php echo $DBInstance->escapeValues($committee->designated_id); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($committee->fname); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($committee->lname); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($committee->email); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($committee->phone); ?></td>
                                <?php if($committee->gender == 'F'): ?>
                                    <td class="text-center"><?php echo "Female"; ?></td>
                                <?php elseif($committee->gender == 'M'): ?>
                                    <td class="text-center"><?php echo "Male"; ?></td>
                                <?php endif; ?>
                                <?php if($committee->role_name == 'board'): ?>
                                    <td class="text-center"><button type="button" class="btn btn-primary btn-xs text-center">Board Member</button></a></td>
                                <?php endif; ?>

                                <td class="text-center"><?php echo $DBInstance->escapeValues($committee->computeTime($committee->timestamp)); ?></td>

                                <?php
                                    if($committee->role_name == "board") {
                                        $assigned_board = TenderBoard::getByID($committee->designated_id);
                                    }
                                ?>
                                <?php if($committee->designated_id == '-1'): ?>
                                    <td class="text-center"><button type="button" class="btn btn-danger btn-xs text-center">Not Assigned</button></a></td>
                                <?php else: ?>
                                    <td class="text-center"><button type="button" class="btn btn-success btn-xs text-center"><?php echo $DBInstance->escapeValues($assigned_board->name); ?></button></a></td>
                                <?php endif; ?>

                                <td class="">
                                    <button type="button" id="assign_committee_membership" class="btn btn-info btn-xs center-block assign_committee_membership" data-toggle="collapse" data-target="#board_membership_edit_section" aria-expanded="false" aria-controls="board_membership_edit_section">
                                        Assign Board Member
                                    </button>
                                </td>
                            </tr>
                            <?php $counter = $counter + 1; ?>
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
