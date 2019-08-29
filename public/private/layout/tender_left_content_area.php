<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Categories</h2>
        </div>
        <div class="panel-body">
            <form action="create/" method="post">
                <div class="form-group">
                    <label for="tender_category_title" class="sr-only">Title</label>
                    <input type="text" class="form-control" id="tender_category_title"name="tender_category_title" placeholder="Tender Title">
                </div>

                <div class="form-group">
                    <label for="tender_category_body" class="sr-only">Article</label>
                    <textarea class="form-control" id="tender_category_body" name="tender_category_body" rows="3" placeholder="Description..."></textarea>
                </div>

                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" id="tender-category-submit-btn" type="submit" name="add_tender_category">Save Tender Category</button>
                </div>
            </form>
        </div>
    </div>
</div>