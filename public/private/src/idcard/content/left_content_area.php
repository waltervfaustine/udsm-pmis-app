<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add User Identification Card</h2>
        </div>
        <div class="panel-body">
            <form action="actionid.php" method="post">
                <div class="form-group">
                    <label for="idcard_name" class="sr-only">ID Card Type Name</label>
                    <input type="text" class="form-control" id="idcard_name"name="idcard_name" placeholder="ID Card Type Name" value=<?php if(isset($_SESSION['idcard_name'])) { if(!empty($_SESSION['idcard_name'])) { echo $_SESSION['idcard_name']; } } ?>>
                </div>
                <div class="form-group">
                    <label for="idcard_desc" class="sr-only">ID Card Type Description</label>
                    <textarea class="form-control" id="idcard_desc" name="idcard_desc" rows="3" placeholder="ID Card Type Description..."><?php if(isset($_SESSION['idcard_desc'])) { if(!empty($_SESSION['idcard_desc'])) { echo $_SESSION['idcard_desc']; }}?></textarea>
                </div>
                <br>
                <div class="form-group">
                   <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="ID Card Information" data-content="TITLE: Eg: National ID DESCRIPTION: Eg: Identity Card For Every Tanzanian Who Reached 18 years Age">MORE INFO</button>
                </div>
                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="idcard_submit_btn" name="add_idcard">Add IDCARD Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

