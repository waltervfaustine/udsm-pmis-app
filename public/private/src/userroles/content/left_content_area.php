<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add User Categories</h2>
        </div>
        <div class="panel-body">
            <form action="actionrl.php" method="post">
                <div class="form-group">
                    <label for="role_title" class="sr-only">Title</label>
                    <input type="text" class="form-control" id="role_title"name="role_title" placeholder="Role Title" value=<?php if(isset($_SESSION['role_title'])) { if(!empty($_SESSION['role_title'])) { echo $_SESSION['role_title']; } } ?>>
                </div>
                <div class="form-group">
                    <label for="role_desc" class="sr-only">Article</label>
                    <textarea class="form-control" id="role_desc" name="role_desc" rows="3" placeholder="Role Description..."><?php if(isset($_SESSION['role_desc'])) { if(!empty($_SESSION['role_desc'])) { echo $_SESSION['role_desc']; }}?></textarea>
                </div>
                <br>
                <div class="form-group">
                   <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="User Roles Information" data-content="TITLE: Eg: Accounting Officer DESCRIPTION: Eg: The Entry Point For Tender Funds Authorization.">MORE INFO</button>
                </div>
                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" id="user_role_submit_btn" name="add_role">Save User Role</button>
                </div>
            </form>
        </div>
    </div>


    <div class="panel panel-default">
    <div id="content" class="panel-heading">
        <h2 class="panel-title">Add Departments</h2>
    </div>
    <div class="panel-body">
        <form action="actiondept.php" method="post">
            <div class="form-group">
                <label for="department_title" class="sr-only">Title</label>
                <input type="text" class="form-control" id="department_title"name="department_title" placeholder="Department Title" value=<?php if(isset($_SESSION['department_title'])) { if(!empty($_SESSION['department_title'])) { echo $_SESSION['department_title']; } } ?>>
            </div>
            <div class="form-group">
                <label for="department_desc" class="sr-only">Article</label>
                <textarea class="form-control" id="department_desc" name="department_desc" rows="3" placeholder="Department Description..."><?php if(isset($_SESSION['department_desc'])) { if(!empty($_SESSION['department_desc'])) { echo $_SESSION['department_desc']; }}?></textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="focus"  title="Departments Information" data-content="TITLE: Eg: Computer Science And Engineering DESCRIPTION: Eg: For Computer Scince and Computer Engineering Student .">MORE INFO</button>
            </div>
            <div class="checkbox"></div>
            <div class="clearfix">
                <button class="btn btn-primary pull-right" type="submit" id="user_department_submit_btn" name="add_department">Save Department</button>
            </div>
        </form>
    </div>
</div>
</div>

