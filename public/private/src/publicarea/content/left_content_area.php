<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Public Story</h2>
        </div>
        <div class="panel-body">
            <form action="actionnw.php?pg=1" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="story_title" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="story_title"name="story_title" placeholder="Public Story Title" value=<?php if(isset($_SESSION['story_title'])) { if( !empty($_SESSION['story_title'])) { echo $_SESSION['story_title']; } } ?>>
                </div>
                <div class="form-group">
                    <label for="story_body" class="sr-only">Article</label>
                    <textarea class="form-control" id="story_body" name="story_body" rows="7" placeholder="Public Story Description..."><?php if (!empty($_SESSION['story_body'])) {echo $_SESSION['story_body']; } ?></textarea>
                </div>
                <div class="hidden form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="input-group-text" for="inputGroupSelect01">Status</label>
                        </span>
                        <input type="text" class="form-control" id="story_status"name="story_status" placeholder="Story Title" value="unpublished" readonly>
                    </div>
                </div>
                <div class="input-group">
                    <label for="story_photo" class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input id="story_photo" type="file" name="story_photo" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>
                <div class="checkbox"></div>
                <input type="hidden" class="form-control" id="story_id" name="story_id">
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" id="public_story_submit_btn" type="submit" name="post_story">Post Story</button>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Public Info Story</h2>
        </div>
        <div class="panel-body">
            <form action="actionps.php?pg=1" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="news_title" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="news_title"name="news_title" placeholder="News Update Title">
                </div>
                <div class="form-group">
                    <label for="news_body" class="sr-only">Article</label>
                    <textarea class="form-control" id="news_body" name="news_body" rows="7" placeholder="News Update Body"></textarea>
                </div>
                <div class="checkbox"></div>
                <input type="hidden" class="form-control" id="news_id" name="news_id">
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" id="news_update_submit_btn" type="submit" name="post_news">Post News Info</button>
                </div>
            </form>
        </div>
    </div>
</div>