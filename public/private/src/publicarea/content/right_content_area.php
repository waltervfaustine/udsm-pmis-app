<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Public Story Information Data</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Story::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Story::getRecordPerPage();
            $total_count = Story::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Story::findRecordsForThisPage($per_page, $pagination->getOffset());
            $stories = Story::getBySQL($result);
        ?>
        
        <div class="panel-body" id="story_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="story_edit_btn">
                    <div class="well">
                    <!-- <img class="img-rounded" id="collapse_story_type" src="../../files/stories/" alt="Story Image" width="595" height="236"> -->
                        <form action="actionnw.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_story_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_story_title" name="story_title" placeholder="Tilte">
                            </div>
                            <div class="form-group">
                                <label for="collapse_story_desc" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_story_desc" name="story_body" rows="3" placeholder="Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <div class="input-group btn btn-info">
                                    <span class="input-group-addon">
                                        <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                    </span>
                                    <input type="text" class="form-control" id="old_story_status" name="old_story_status" placeholder="Story Title" value="unpublished" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <label class="input-group-text" for="inputGroupSelect01">Change Post Status</label>
                                    </span>
                                    <select class="form-control" id="collapse_story_status" name="story_status">
                                        <option selected value="unpublished">Unpublished</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="collapse_story_filename" name="story_filename">
                            <input type="hidden" id="collapse_story_type" name="story_type">
                            <input type="hidden" id="collapse_story_size" name="story_size">
                            <div class="form-group">
                                <input type="hidden" id="collapse_story_id" name="story_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="public_story_update_btn" type="submit" name="update_story">Update</button>
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
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($stories as $story): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($story->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($story->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($story->body); ?></td>
                            <?php
                                if($story->status == "unpublished") {
                                    echo "<td class=\"text-center\">";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-warning btn-xs story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($story->status);
                                    echo "</button>";
                                    echo "</td>";
                                }else if($story->status == "published"){
                                    echo "<td class=\"text-center\">";
                                    echo "<button type=\"button\" id=\"public_story_edit_btn\" class=\"btn btn-success btn-xs story-edit-btn\" data-toggle=\"collapse\" data-target=\"#story_edit_btn\" aria-expanded=\"false\" aria-controls=\"story_edit_btn\">";
                                        echo $DBInstance->HTMLEntitiesDecoding($story->status);
                                    echo "</button>";
                                    echo "</td>";
                                }
                            ?>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($story->status); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($story->filename); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($story->type); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($story->size); ?></td>
                            <td class="text-center">
                                <button type="button" id="public_story_edit_btn" class="btn btn-info btn-xs story-edit-btn" data-toggle="collapse" data-target="#story_edit_btn" aria-expanded="false" aria-controls="story_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class="text-center"><a href="actionnw.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($story->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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
                <p><?php echo "Showing ".$pagination->getFirstItem()." to ".$pagination->getLastItem() ." of ".$total_count." entries."; ?></p>
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
<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2 class="panel-title">Public News Information Data</h2>
    </div>
        <?php
            global $DBInstance;
            $page = News::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = News::getRecordPerPage();
            $total_count = News::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = News::findRecordsForThisPage($per_page, $pagination->getOffset());
            $allnews = News::getBySQL($result);
        ?>
        
        <div class="panel-body" id="news_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="news_edit_btn">
                    <div class="well">
                        <form action="actionps.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_news_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_news_title" name="news_title" placeholder="News Update Title">
                            </div>

                            <div class="form-group">
                                <label for="collapse_news_body" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_news_body" name="news_body" rows="3" placeholder="News Update Description..."></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="collapse_news_id" name="news_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="news_update_update_btn" type="submit" name="post_news">Update</button>
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
                    <?php foreach($allnews as $news): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($news->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($news->title); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($news->body); ?></td>
                            <td class="text-center">
                                <button type="button" id="news_update_edit_btn" class="btn btn-info btn-xs news-edit-btn" data-toggle="collapse" data-target="#news_edit_btn" aria-expanded="false" aria-controls="news_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class="text-center"><a href="actionps.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($news->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
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
                <p><?php echo "Showing ".$pagination->getFirstItem()." to ".$pagination->getLastItem() ." of ".$total_count." entries."; ?></p>
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