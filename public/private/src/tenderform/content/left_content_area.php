<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Requirement Form</h2>
        </div>
        <div class="panel-body">
            <form action="actionfm.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="document_title" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="document_title" name="document_title" placeholder="Requirement Form Title" value=<?php if(isset($_SESSION['document_title'])) {if(!empty($_SESSION['document_title'])) { echo $_SESSION['document_title']; } } ?>>
                </div>

                <div class="form-group">
                    <label for="document_desc" class="sr-only">Article</label>
                    <textarea class="form-control" id="document_desc" name="document_desc" rows="3" placeholder="Requirement Form Description"><?php if(!empty($_SESSION['document_desc'])) {echo $_SESSION['document_desc']; } ?></textarea>
                </div>

                <div class="input-group">
                    <label for="document_file" class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input id="document_file" type="file" name="document_file" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>

                <div class="checkbox"></div>
                <input type="hidden" class="form-control" id="document_id" name="document_id">
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="requirement_document_submit_btn" name="add_document">Send Requirement Form</button>
                </div>
            </form>
        </div>
    </div>
</div>