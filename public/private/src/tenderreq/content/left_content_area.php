<div class="col-md-4">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Requirement Forms</h2>
        </div>
        <div class="panel-body">
            <form action="actionreq.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="requirement_title" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="requirement_title"name="requirement_title" placeholder="Requirement Title" value=<?php if(isset($_SESSION['requirement_title'])) {if(!empty($_SESSION['requirement_title'])) { echo $_SESSION['requirement_title']; } } ?>>
                </div>

                <div class="form-group">
                    <label for="requirement_desc" class="sr-only">Article</label>
                    <textarea class="form-control" id="requirement_desc" name="requirement_desc" rows="3" placeholder="Requirement Description"><?php if(!empty($_SESSION['requirement_desc'])) {echo $_SESSION['requirement_desc']; } ?></textarea>
                </div>

                <div class="hidden form-group">
                    <label for="requirement_status" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="requirement_status"name="requirement_status" placeholder="Requirement Status" value="unapproved" ?>>
                </div>

                <div class="hidden form-group">
                    <label for="requirement_requesterid" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="requirement_requesterid" name="requirement_requesterid" placeholder="Requirement Requester ID" value=<?php if(isset($_SESSION['currentUID'])) {if(!empty($_SESSION['currentUID'])) { echo $_SESSION['currentUID']; } } ?>>
                </div>

                <div class="input-group">
                    <label for="requirement_docfile" class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input id="requirement_docfile" type="file" name="requirement_docfile" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>

                <div class="checkbox"></div>
                <input type="hidden" class="form-control" id="requirement_id" name="requirement_id">
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="user_requirement_submit_btn" name="add_user_requirement">Submit Requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>