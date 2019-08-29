<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Committee Name</h2>
        </div>
        <div class="panel-body">
            <form action="actioncomm.php" method="post">
                <div class="form-group">
                    <label for="committee_name" class="sr-only"></label>
                    <input type="text" class="form-control" id="committee_name"name="committee_name" placeholder="Committee name" value=<?php if(isset($_SESSION['committee_name'])) { if(!empty($_SESSION['committee_name'])) { echo $_SESSION['committee_name']; } } ?>>
                </div>
                <div class="form-group">
                    <label for="committee_desc" class="sr-only"></label>
                    <textarea class="form-control" id="committee_desc" name="committee_desc" rows="5" placeholder="Committee Description..."><?php if(isset($_SESSION['committee_desc'])) { if(!empty($_SESSION['committee_desc'])) { echo $_SESSION['committee_desc']; }}?></textarea>
                </div>
                <br>
                <div class="form-group">
                   <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="Committee Name Information" data-content="TITLE: Eg: Kilimo Kwanza">MORE INFO</button>
                </div>
                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="committee_submit_btn" name="add_committee_name">Save Committee Name</button>
                </div>
            </form>
        </div>
    </div>


    <div class="panel panel-default">
    <div id="content" class="panel-heading">
        <h2 class="panel-title">Add Board Name</h2>
    </div>
    <div class="panel-body">
        <form action="actiontboard.php" method="post">
            <div class="form-group">
                <label for="tenderboard_name" class="sr-only"></label>
                <input type="text" class="form-control" id="tenderboard_name"name="tenderboard_name" placeholder="Tender Board Title" value=<?php if(isset($_SESSION['tenderboard_name'])) { if(!empty($_SESSION['tenderboard_name'])) { echo $_SESSION['tenderboard_name']; } } ?>>
            </div>
            <div class="form-group">
                <label for="tenderboard_desc" class="sr-only"></label>
                <textarea class="form-control" id="tenderboard_desc" name="tenderboard_desc" rows="5" placeholder="Tender Board Description..."><?php if(isset($_SESSION['tenderboard_desc'])) { if(!empty($_SESSION['tenderboard_desc'])) { echo $_SESSION['tenderboard_desc']; }}?></textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="Tender Board Name" data-content="TITLE: Eg: Mkurabita">MORE INFO</button>
            </div>
            <div class="checkbox"></div>
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit" id="tenderboard_submit_btn" name="add_tender_board">Save Board Name</button>
            </div>
        </form>
    </div>
</div>
</div>

