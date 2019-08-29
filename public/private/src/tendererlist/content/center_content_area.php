<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Unverified Stakeholders PMIS Accounts</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Stakeholder::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Stakeholder::getRecordPerPage();
            $total_count = Stakeholder::getCountAllUnApprovedUnVerified();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Stakeholder::findRecordsForThisPage($per_page, $pagination->getOffset());
            $stakeholders = Stakeholder::getBySQL($result);
        ?>
        
        <div class="panel-body" id="stakeholder_content_area">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Firstname</th>
                        <th class="info">Middle</th>
                        <th class="info">Lastname</th>
                        <th class="info">email</th>
                        <th class="info">phone</th>
                        <th class="info">Gender</th>
                        <th class="info">Username</th>
                        <th class="info">Account</th>
                        <th class="info">Account</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stakeholders as $stakeholder): ?>
                    <?php global $DBInstance; ?>
                        <?php if($stakeholder->status == "unapproved" && $stakeholder->verification == 'unverified'): ?>
                            <tr>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->id); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->fname); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->mname); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->lname); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->email); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->phone); ?></td>
                                <?php if($stakeholder->gender == 'F'): ?>
                                    <td class=""><?php echo "Female"; ?></td>
                                <?php elseif($stakeholder->gender == 'M'): ?>
                                    <td class=""><?php echo "Male"; ?></td>
                                <?php endif; ?>

                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->username); ?></td>
                                <?php
                                    echo "<td class=\"\"center-block>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-warning btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($stakeholder->status);
                                    echo "</button>";
                                    echo "</td>";

                                    echo "<td class=\"\"center-block>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-warning btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($stakeholder->verification);
                                    echo "</button>";
                                    echo "</td>";
                                ?>

                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->status); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->filename); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->type); ?></td>
                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->size); ?></td>
                                <td class="">
                                    <button type="button" id="public_stakeholder_edit_btn" class="btn btn-info btn-xs center-block stakeholder-edit-btn" data-toggle="collapse" data-target="#stakeholder_edit_btn" aria-expanded="false" aria-controls="stakeholder_edit_btn">
                                        Edit Info
                                    </button>
                                </td>
                                <td class=""><a href="actionnw.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->id); ?>"><button type="button" class="btn btn-danger btn-xs center-block">Delete Info</button></a></td>
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
                <?php endif;?>             </div>
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
        <h2 class="panel-title">Unapproved Stakeholders PMIS Accounts</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Stakeholder::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Stakeholder::getRecordPerPage();
            $total_count = Stakeholder::getCountAllVerifiedUnApproved();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Stakeholder::findRecordsForThisPage($per_page, $pagination->getOffset());
            $stakeholders = Stakeholder::getBySQL($result);
        ?>
        
        <div class="panel-body" id="stakeholder_unapproved_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="stakeholder_unapproved_verified_edit_btn">
                    <div class="well">
                        <form action="actiontndrlist.php?pg=1" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="collapse_unapproved_stakeholder_status">Approve Stakeholder Account</label></span>
                                        <select class="form-control" id="collapse_unapproved_stakeholder_status" name="unapproved_stakeholder_status">
                                            <option selected value="unapproved">Unapprove</option>
                                            <option value="approved">Approve</option>
                                        </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary pull-right" id="collapse_unapproved_stakeholder_update_btn" type="submit" name="update_unapproved_stakeholder">Update</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_unapproved_stakeholder_id" name="collapse_unapproved_stakeholder_id">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Firstname</th>
                        <th class="info">Middle name</th>
                        <th class="info">Lastname</th>
                        <th class="info">email</th>
                        <th class="info">phone</th>
                        <th class="info">Gender</th>
                        <th class="info">Username</th>
                        <th class="info">Account</th>
                        <th class="info">Account</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stakeholders as $stakeholder): ?>
                    <?php global $DBInstance; ?>
                        <?php if($stakeholder->status == "unapproved" AND $stakeholder->verification == 'verified'): ?>
                            <tr>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->id); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->fname); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->mname); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->lname); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->email); ?></td>
                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->phone); ?></td>
                                <?php if($stakeholder->gender == 'F'): ?>
                                    <td class=""><?php echo "Female"; ?></td>
                                <?php elseif($stakeholder->gender == 'M'): ?>
                                    <td class=""><?php echo "Male"; ?></td>
                                <?php endif; ?>

                                <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->username); ?></td>
                                <?php
                                    echo "<td class=\"\"center-block>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-secondary btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($stakeholder->status);
                                    echo "</button>";
                                    echo "</td>";

                                    echo "<td class=\"\"center-block>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-success btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($stakeholder->verification);
                                    echo "</button>";
                                    echo "</td>";
                                ?>

                                <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->status); ?></td>
                                <td class="">
                                    <button type="button" id="unapproved_stakeholder_edit_btn" class="btn btn-info btn-xs center-block unapprove-stakeholder-edit-btn" data-toggle="collapse" data-target="#stakeholder_unapproved_verified_edit_btn" aria-expanded="false" aria-controls="stakeholder_unapproved_verified_edit_btn">
                                        Edit Info
                                    </button>
                                </td>
                                <td class=""><a href="actionnw.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($stakeholder->id); ?>"><button type="button" class="btn btn-danger btn-xs center-block">Delete Info</button></a></td>
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
        <h2 class="panel-title">Approved And Verified Stakeholders PMIS Accounts</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Stakeholder::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Stakeholder::getRecordPerPage();
            $total_count = Stakeholder::getCountAllApprovedVerified();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Stakeholder::findRecordsForThisPage($per_page, $pagination->getOffset());
            $stakeholders = Stakeholder::getBySQL($result);
        ?>
        
        <div class="panel-body" id="stakeholder_approved_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="stakeholder_verified_approved_edit_btn">
                    <div class="well">
                        <form action="actiontndrlist.php?pg=1" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><label class="input-group-text" for="collapse_approved_stakeholder_status">Approve Stakeholder Account</label></span>
                                        <select class="form-control" id="collapse_approved_stakeholder_status" name="collapse_approved_stakeholder_status">
                                            <option selected value="unapproved">Unapprove</option>
                                            <option value="approved">Approve</option>
                                        </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary pull-right" id="approved_stakeholder_update_btn" type="submit" name="update_approved_stakeholder">Update</button>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" id="collapse_stakeholder_filename" name="stakeholder_filename">
                            <div class="form-group">
                                <input type="hidden" id="collapse_approved_stakeholder_id" name="collapse_approved_stakeholder_id">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Firstname</th>
                        <th class="info">Middle</th>
                        <th class="info">Lastname</th>
                        <th class="info">email</th>
                        <th class="info">phone</th>
                        <th class="info">Gender</th>
                        <th class="info">Username</th>
                        <th class="info">Account</th>
                        <th class="info">Account</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stakeholders as $stakeholder): ?>
                    <?php global $DBInstance; ?>
                        <?php if($stakeholder->status == "approved" && $stakeholder->verification == 'verified'): ?>
                            <tr>
                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->id); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->fname); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->mname); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->lname); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->email); ?></td>
                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->phone); ?></td>
                                <?php if($stakeholder->gender == 'F'): ?>
                                    <td class=""><?php echo "Female"; ?></td>
                                <?php elseif($stakeholder->gender == 'M'): ?>
                                    <td class=""><?php echo "Male"; ?></td>
                                <?php endif; ?>

                                <td class=""><?php echo $DBInstance->escapeValues($stakeholder->username); ?></td>
                                <?php
                                    echo "<td class=\"\"center-block>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-success btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->escapeValues($stakeholder->status);
                                    echo "</button>";
                                    echo "</td>";

                                    echo "<td class=\"\"center-block>";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-success btn-xs center-block story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->escapeValues($stakeholder->verification);
                                    echo "</button>";
                                    echo "</td>";
                                ?>

                                <td class="hidden"><?php echo $DBInstance->escapeValues($stakeholder->status); ?></td>
                                <td class="hidden"><?php echo $DBInstance->escapeValues($stakeholder->filename); ?></td>
                                <td class="hidden"><?php echo $DBInstance->escapeValues($stakeholder->type); ?></td>
                                <td class="hidden"><?php echo $DBInstance->escapeValues($stakeholder->size); ?></td>
                                <td class="">
                                    <button type="button" id="approved_stakeholder_edit_btn" class="btn btn-info btn-xs center-block approved-stakeholder-edit-btn" data-toggle="collapse" data-target="#stakeholder_verified_approved_edit_btn" aria-expanded="false" aria-controls="stakeholder_verified_approved_edit_btn">
                                        Edit Info
                                    </button>
                                </td>
                                <td class=""><a href="actionnw.php?id=<?php echo $DBInstance->escapeValues($stakeholder->id); ?>"><button type="button" class="btn btn-danger btn-xs center-block">Delete Info</button></a></td>
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
