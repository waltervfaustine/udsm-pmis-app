<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Story</h2>
        </div>
        <div class="panel-body">
            <form action="create/" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="requirement_title" class="sr-only">Story Title</label>
                    <input type="text" class="form-control" id="requirement_title"name="requirement_title" placeholder="Requirement Title">
                </div>

                <div class="form-group">
                    <label for="requirement_desc" class="sr-only">Article</label>
                    <textarea class="form-control" id="requirement_desc" name="requirement_desc" rows="3" placeholder="Requirement Description"></textarea>
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
                    <button class="btn btn-primary pull-right" type="submit" name="add_user_requirement">Submit Requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>