<div class="col-md-7">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Tender Category Information</h2>
    </div>
        <?php
            global $DBInstance;
            $page = TenderCategory::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = TenderCategory::getRecordPerPage();
            $total_count = TenderCategory::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderCategory::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderCategories = TenderCategory::getBySQL($result);
        ?>
        <div class="panel-body" id="tender_category_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="tender_category_edit_button">
                    <div class="well">
                        <form action="actiontc.php" method="post">
                            <div class="form-group">
                                <label for="collapse_tender_category_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_tender_category_title" name="tender_category_title" placeholder="Tender Title">
                            </div>
                            <div class="form-group">
                                <label for="collapse_tender_category_body" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_tender_category_body" name="tender_category_body" rows="3" placeholder="Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_tender_category_id" name="tender_category_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="tender_category_update_btn" type="submit" name="add_tender_category">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach($tenderCategories as $tenderCategory): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->body); ?></td>
                            <td class="text-center">
                                <button type="button" id="tender_category_edit_btn" class="btn btn-info btn-xs tender-category-edit-btn" data-toggle="collapse" data-target="#tender_category_edit_button" aria-expanded="false" aria-controls="tender_category_edit_button">
                                    Edit Info
                                </button>
                            </td>
                            <td class="text-center" id="delete_tender_category"><a href="actiontc.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderCategory->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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
        <h2 class="panel-title">Business/Item Category Information</h2>
    </div>
        <?php
            global $DBInstance;
            $page = BusinessCategory::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = BusinessCategory::getRecordPerPage();
            $total_count = BusinessCategory::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = BusinessCategory::findRecordsForThisPage($per_page, $pagination->getOffset());
            $businessCategories = BusinessCategory::getBySQL($result);
        ?>
        <div class="panel-body" id="business_category_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="business_category_edit_button">
                    <div class="well">
                        <form action="actionbc.php" method="post">
                            <div class="form-group">
                                <label for="collapse_business_category_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_business_category_title" name="business_category_title" placeholder="Business Category Title">
                            </div>
                            <div class="form-group">
                                <label for="collapse_business_category_body" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_business_category_body" name="business_category_body" rows="3" placeholder="Business Category Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_business_category_id" name="business_category_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="business_category_update_btn" type="submit" name="add_business_category">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Title</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($businessCategories as $businessCategory): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($businessCategory->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($businessCategory->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($businessCategory->body); ?></td>
                            <td class="text-center">
                                <button type="button" id="business_category_edit_btn" class="btn btn-info btn-xs business-category-edit-btn" data-toggle="collapse" data-target="#business_category_edit_button" aria-expanded="false" aria-controls="business_category_edit_button">
                                    Edit Info
                                </button>
                            </td>
                            <td class="text-center" id="delete_business_category"><a href="actionbc.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($businessCategory->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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