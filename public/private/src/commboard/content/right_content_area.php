<div class="col-md-7">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Committee Information</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Committee::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Committee::getRecordPerPage();
            $total_count = Committee::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Committee::findRecordsForThisPage($per_page, $pagination->getOffset());
            $committees = Committee::getBySQL($result);
        ?>
        
        <div class="panel-body" id="committee_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="committee_edit_btn">
                    <div class="well">
                        <form action="actioncomm.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_committee_name" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_committee_name" name="committee_name" placeholder="Tilte">
                            </div>
                            <div class="form-group">
                                <label for="collapse_committee_desc" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_committee_desc" name="committee_desc" rows="3" placeholder="Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_committee_id" name="committee_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="committee_update_btn" type="submit" name="add_committee_name">Update Committee Details</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Name</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($committees as $committee): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($committee->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($committee->name); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($committee->description); ?></td>
                            <td class="">
                                <button id="committee_edit_btn" type="button" class="btn btn-info btn-xs committee-edit-btn" data-toggle="collapse" data-target="#committee_edit_btn" aria-expanded="false" aria-controls="committee_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="actioncomm.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($committee->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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


    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Update and Delete Tender Board Name</h2>
    </div>
        <?php
            global $DBInstance;
            $page = TenderBoard::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = TenderBoard::getRecordPerPage();
            $total_count = TenderBoard::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderBoard::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderboards = TenderBoard::getBySQL($result);
        ?>
        
        <div class="panel-body" id="tenderboard_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="tenderboard_edit_btn">
                    <div class="well">
                        <form action="actiontboard.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_tenderboard_name" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_tenderboard_name" name="tenderboard_name" placeholder="Tender Board Title">
                            </div>
                            <div class="form-group">
                                <label for="collapse_tenderboard_desc" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_tenderboard_desc" name="tenderboard_desc" rows="3" placeholder="Tender Board Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_tenderboard_id" name="tenderboard_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="tenderboard_update_btn" type="submit" name="add_tender_board">Update Tender Board Details</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Name</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($tenderboards as $tenderboard): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderboard->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderboard->name); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderboard->description); ?></td>
                            <td class="">
                                <button id="tenderboard_edit_btn" type="button" class="btn btn-info btn-xs tenderboard-edit-btn" data-toggle="collapse" data-target="#tenderboard_edit_btn" aria-expanded="false" aria-controls="tenderboard_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="actiontboard.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderboard->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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