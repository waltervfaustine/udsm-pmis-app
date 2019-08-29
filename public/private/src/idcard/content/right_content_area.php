<div class="col-md-7">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Update ID CARD Type</h2>
    </div>
        <?php
            global $DBInstance;
            $page = IdentificationCard::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = IdentificationCard::getRecordPerPage();
            $total_count = IdentificationCard::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = IdentificationCard::findRecordsForThisPage($per_page, $pagination->getOffset());
            $identificationCards = IdentificationCard::getBySQL($result);
        ?>
        
        <div class="panel-body" id="idcard_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="idcard_edit_btn">
                    <div class="well">
                        <form action="actionid.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_idcard_name" class="sr-only">ID Card Type Name</label>
                                <input type="text" class="form-control" id="collapse_idcard_name" name="idcard_name" placeholder="ID Card Type Name">
                            </div>
                            <div class="form-group">
                                <label for="collapse_idcard_desc" class="sr-only">ID Card Type Description</label>
                                <textarea class="form-control" id="collapse_idcard_desc" name="idcard_desc" rows="3" placeholder="ID Card Type Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_idcard_id" name="idcard_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="idcard_update_btn" type="submit" name="add_idcard">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">IdentificationCard</th>
                        <th class="info text-center">Description</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($identificationCards as $identificationCard): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($identificationCard->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($identificationCard->name); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($identificationCard->description); ?></td>
                            <td class="">
                                <button id="idcard_edit_btn" type="button" class="btn btn-info btn-xs idcard-edit-btn" data-toggle="collapse" data-target="#idcard_edit_btn" aria-expanded="false" aria-controls="idcard_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="actionid.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($identificationCard->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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