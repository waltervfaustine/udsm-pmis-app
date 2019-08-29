<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Register Tender stage</h2>
        </div>
        <div class="panel-body">
            <form action="actiontendpro.php" method="post">
                <div class="form-group">
                    <label for="tender_stage_name" class="sr-only">ID Card Type Name</label>
                    <input type="text" class="form-control" id="tender_stage_name" name="tender_stage_name" placeholder="Tender Stage Title" value=<?php if(isset($_SESSION['tender_stage_name'])) { if(!empty($_SESSION['tender_stage_name'])) { echo $_SESSION['tender_stage_name']; } } ?>>
                </div>
                <div class="form-group">
                    <label for="tender_stage_desc" class="sr-only">ID Card Type Description</label>
                    <textarea class="form-control" id="tender_stage_desc" name="tender_stage_desc" rows="3" placeholder="Tender Stage Description..."><?php if(isset($_SESSION['tender_stage_desc'])) { if(!empty($_SESSION['tender_stage_desc'])) { echo $_SESSION['tender_stage_desc']; }}?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="Tender Stage Title" data-content="stage Title Eg: Invitation of Tenders/Outsourcing">MORE INFO</button>
                </div>
                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" name="add_stage_name">Register stage</button>
                </div>
            </form>
        </div>
    </div>
</div>

