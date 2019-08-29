<div class="col-md-4">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Submit Tender Application</h2>
        </div>
        <div class="panel-body">
            <form action="actionapplytender.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="stkapply_comment" class="sr-only"></label>
                    <textarea class="form-control" id="stkapply_comment" name="stkapply_comment" rows="7" placeholder="Tenderer Comment..."><?php if(!empty($_SESSION['stkapply_comment'])) {echo $_SESSION['stkapply_comment']; } ?></textarea>
                </div>

                <div class="hidden form-group">
                    <input type="text" class="form-control" id="stkapply_tenderid" name="stkapply_tenderid" placeholder="Tender ID" value=<?php if(isset($_SESSION['appliedtenderid'])) {if(!empty($_SESSION['appliedtenderid'])) { echo $_SESSION['appliedtenderid']; } } ?>>
                </div>
                
                <div class="hidden form-group">
                    <input type="text" class="form-control" id="stkapply_stakeholderid" name="stkapply_stakeholderid" placeholder="Stakeholder ID" value=<?php if(isset($_SESSION['stakeholderuid'])) {if(!empty($_SESSION['stakeholderuid'])) { echo $_SESSION['stakeholderuid']; } } ?>>
                </div>

                <div class="input-group">
                    <label for="stktender_docfile" class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse&hellip; <input id="stktender_docfile" type="file" name="stktender_docfile" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>

                <div class="checkbox"></div>
                <input type="hidden" class="form-control" id="stkapply_applicationid" name="stkapply_applicationid">
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="stkapply_submit_btn" name="send_application">Submit Tender Application</button>
                </div>
            </form>
        </div>
    </div>
</div>