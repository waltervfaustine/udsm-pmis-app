<div class="col-md-4">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Information</h2>
        </div>
        <div class="panel-body">
            <form action="actionpreptend.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="preptender_title" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="preptender_title"name="preptender_title" placeholder="Tender Title" value=<?php if(isset($_SESSION['preptender_title'])) {if(!empty($_SESSION['preptender_title'])) { echo $_SESSION['preptender_title']; } } ?>>
                </div>

                <div class="form-group">
                    <label for="preptender_desc" class="sr-only">Article</label>
                    <textarea class="form-control" id="preptender_desc" name="preptender_desc" rows="3" placeholder="Tender Description"><?php if(!empty($_SESSION['preptender_desc'])) {echo $_SESSION['preptender_desc']; } ?></textarea>
                </div>

                <?php $businessCategories = BusinessCategory::getAll(); ?>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="input-group-text" for="preptender_categoryid">Categories</label>
                        </span>
                        <select class="form-control" id="preptender_categoryid" name="preptender_categoryid">
                            <option selected>Choose...</option>
                            <?php foreach($businessCategories as $businessCategory): ?>
                            <option value="<?php echo $businessCategory->id; ?>"> <?php echo $businessCategory->title; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="hidden form-group">
                    <label for="preptender_currentuid" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="preptender_status"name="preptender_status" placeholder="Tender Status" value="unapproved" ?>>
                </div>


                <div class="hidden form-group">
                    <input type="text" class="form-control" id="preptender_requesterid" name="preptender_requesterid" placeholder="preptender Requester ID" value=<?php if(isset($_SESSION['requesteruid'])) {if(!empty($_SESSION['requesteruid'])) { echo $_SESSION['requesteruid']; } } ?>>
                </div>
                
                <div class="hidden form-group">
                    <input type="text" class="form-control" id="preptender_currentuid" name="preptender_currentuid" placeholder="preptender Current ID" value=<?php if(isset($_SESSION['currentUID'])) {if(!empty($_SESSION['currentUID'])) { echo $_SESSION['currentUID']; } } ?>>
                </div>

                <div class="hidden form-group">
                    <input type="text" class="form-control" id="preptender_reqid" name="preptender_reqid" placeholder="preptender Requester ID" value=<?php if(isset($_SESSION['requirementuid'])) {if(!empty($_SESSION['requirementuid'])) { echo $_SESSION['requirementuid']; } } ?>>
                </div>

                <div class="hidden form-group">
                    <input type="text" class="form-control" id="preptender_timestamp" name="preptender_timestamp" placeholder="preptender Requester ID" value=<?php echo time(); ?>>
                </div>
                
                <div class="hidden form-group">
                    <input type="text" class="form-control" id="preptender_committeeid" name="preptender_committeeid" placeholder="preptender Requester ID" value=<?php echo "-1"; ?>>
                </div>

                <div class="hidden form-group">
                    <input type="text" class="form-control" id="preptender_tenderboardid" name="preptender_tenderboardid" placeholder="preptender Requester ID" value=<?php echo "-1"; ?>>
                </div>

                <div class="input-group">
                    <label for="preptender_docfile" class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input id="preptender_docfile" type="file" name="preptender_docfile" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>

                <div class="checkbox"></div>
                <input type="hidden" class="form-control" id="preptender_id" name="preptender_id">
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="user_preptender_submit_btn" name="post_tender">Submit preptender</button>
                </div>
            </form>
        </div>
    </div>
</div>