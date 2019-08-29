<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Tender Categories</h2>
        </div>
        <div class="panel-body">
            <form action="actiontc.php" method="post">
                <div class="form-group">
                    <label for="tender_category_title" class="sr-only">Title</label>
                    <input type="text" class="form-control" id="tender_category_title" name="tender_category_title" placeholder="Tender Title" value=<?php if(isset($_SESSION['tender_category_title'])) {if(!empty($_SESSION['tender_category_title'])) { echo $_SESSION['tender_category_title']; } } ?>> 
                </div>
                <!-- &nbsp;<p>Eg: Electrical and Electronics</p> -->

                <div class="form-group">
                    <label for="tender_category_body" class="sr-only">Article</label>
                    <textarea class="form-control" id="tender_category_body" name="tender_category_body" rows="3" placeholder="Category Description..." ><?php if(!empty($_SESSION['tender_category_body'])) {echo $_SESSION['tender_category_body']; } ?></textarea>  
                    <!-- &nbsp;<p>Eg: Equipment for the electical wiring in buildings</p> -->
                </div>
                <br>
                <div class="form-group">
                   <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="Tender Category Information" data-content="TITLE: Eg: Electrical and Electronics and DESCRIPTION: Eg: Equipment for the electical wiring in buildings  ">MORE INFO</button>
                </div>

                <div class="checkbox"></div>
                <div class="clearfix">
                    <button data-loading-text="Saving Tender Category..." autocomplete="off" class="btn btn-primary pull-right" id="tender_category_submit_btn" type="submit" name="add_tender_category">Save Tender Category</button>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Business Category</h2>
        </div>
        <div class="panel-body">
            <form action="actionbc.php" method="post">
                <div class="form-group">
                    <label for="business_category_title" class="sr-only">Title</label>
                    <input type="text" class="form-control" id="business_category_title" name="business_category_title" placeholder="Business Category Title" value=<?php if(isset($_SESSION['business_category_title'])) {if(!empty($_SESSION['business_category_title'])) { echo $_SESSION['business_category_title']; } } ?>> 
                </div>
                <!-- &nbsp;<p>Eg: Electrical and Electronics</p> -->

                <div class="form-group">
                    <label for="business_category_body" class="sr-only">Article</label>
                    <textarea class="form-control" id="business_category_body" name="business_category_body" rows="3" placeholder="Business Category Description..." ><?php if(!empty($_SESSION['business_category_body'])) {echo $_SESSION['business_category_body']; } ?></textarea>  
                    <!-- &nbsp;<p>Eg: Equipment for the electical wiring in buildings</p> -->
                </div>
                <br>
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="Business Category Information" data-content="TITLE: Eg: Electrical and Electronics and DESCRIPTION: Eg: Equipment for the electical wiring in buildings  ">MORE INFO</button>
                </div>

                <div class="checkbox"></div>
                <div class="clearfix">
                    <button data-loading-text="Saving Tender Category..." autocomplete="off" class="btn btn-primary pull-right" id="business_category_submit_btn" type="submit" name="add_business_category">Save Business Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

