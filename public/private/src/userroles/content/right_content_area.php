<div class="col-md-7">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Update and Delete User Categories</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Role::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Role::getRecordPerPage();
            $total_count = Role::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Role::findRecordsForThisPage($per_page, $pagination->getOffset());
            $roles = Role::getBySQL($result);
        ?>
        
        <div class="panel-body" id="content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="role_edit_btn">
                    <div class="well">
                        <form action="actionrl.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_role_title" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_role_title" name="role_title" placeholder="Tilte">
                            </div>
                            <div class="form-group">
                                <label for="collapse_role_desc" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_role_desc" name="role_desc" rows="3" placeholder="Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_role_id" name="role_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="user_role_update_btn" type="submit" name="add_role">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Role</th>
                        <th class="info">Description</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($roles as $role): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($role->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($role->name); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($role->description); ?></td>
                            <td class="">
                                <button id="user_role_edit_btn" type="button" class="btn btn-info btn-xs role-edit-btn" data-toggle="collapse" data-target="#role_edit_btn" aria-expanded="false" aria-controls="role_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="actionrl.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($role->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center">
                <ul class="pagination">
                    <?php 
                        if($pagination->totalPage() > 1) {
                            if($pagination->hasPreviousPage()) {
                                echo "<li class=\"disabled\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getPreviousPage();
                                echo "\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>";
                                echo "</li>";
                            }

                            for($i = 1; $i <= $pagination->totalPage(); $i++) {
                                if($i == $page) {
                                    echo "<li class=\"active\">";
                                    echo "<span aria-hidden=\"true\">";
                                    echo "{$i}";
                                    echo "</span>";
                                    echo "</li>";
                                }else {
                                    echo "<li class=\"\">";
                                    echo "<a href=\"index.php?pg=";
                                    echo "{$i}";
                                    echo "\">";
                                    echo "<span aria-hidden=\"true\">";
                                    echo "{$i}";
                                    echo "</span>";
                                    echo "</a>";
                                    echo "</li>";
                                }
                            }
                            
                            if($pagination->hasNextPage()) {
                                echo "<li class=\"disabled\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getNextPage();
                                echo "\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>";
                                echo "</li>";
                            }
                        }
                    ?>
                </ul>
                <?php if($total_count == 0): ?>
                    <p><?php echo "Oops! Currently No result found!  <strong>".$total_count." item returned.</strong>"; ?></p>
                <?php elseif($total_count >= 1):?>
                    <p><?php echo "Showing ".$pagination->getFirstItem()." to ".$pagination->getLastItem() ." of ".$total_count." entries."; ?></p>
                <?php endif;?>            </div>
            <nav aria-label="...">
                <ul class="pager">
                    <?php 
                        if($pagination->totalPage() > 1) {
                            if($pagination->hasPreviousPage()) {
                                echo "<li class=\"previous\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getPreviousPage();
                                echo "\"><span aria-hidden=\"true\">&larr;</span> Older</a>";
                                echo "</li>";
                            }
                            
                            if($pagination->hasNextPage()) {
                                echo "<li class=\"next\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getNextPage();
                                echo "\"><span aria-hidden=\"true\">&rarr;</span> Newer</a>";
                                echo "</li>";
                            }
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </div>


    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Update and Delete User Categories</h2>
    </div>
        <?php
            global $DBInstance;
            $page = Department::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = Department::getRecordPerPage();
            $total_count = Department::getCountAll();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = Department::findRecordsForThisPage($per_page, $pagination->getOffset());
            $departments = Department::getBySQL($result);
        ?>
        
        <div class="panel-body" id="department_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="department_edit_btn">
                    <div class="well">
                        <form action="actiondept.php?pg=1" method="post">
                            <div class="form-group">
                                <label for="collapse_department_name" class="sr-only">Title</label>
                                <input type="text" class="form-control" id="collapse_department_name" name="department_title" placeholder="Tilte">
                            </div>
                            <div class="form-group">
                                <label for="collapse_department_desc" class="sr-only">Article</label>
                                <textarea class="form-control" id="collapse_department_desc" name="department_desc" rows="3" placeholder="Description..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="collapse_department_id" name="department_id">
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" id="user_department_update_btn" type="submit" name="add_department">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info"><span class="glyphicon glyphicon-expand"></span></th>
                        <th class="info">Department</th>
                        <th class="info">Description</th>
                        <th class="info"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($departments as $department): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($department->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($department->name); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($department->description); ?></td>
                            <td class="">
                                <button id="department_edit_btn" type="button" class="btn btn-info btn-xs department-edit-btn" data-toggle="collapse" data-target="#department_edit_btn" aria-expanded="false" aria-controls="department_edit_btn">
                                    Edit Info
                                </button>
                            </td>
                            <td class=""><a href="actiondept.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($department->id); ?>"><button type="button" class="btn btn-danger btn-xs">Delete Info</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center">
                <ul class="pagination">
                    <?php 
                        if($pagination->totalPage() > 1) {
                            if($pagination->hasPreviousPage()) {
                                echo "<li class=\"disabled\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getPreviousPage();
                                echo "\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>";
                                echo "</li>";
                            }

                            for($i = 1; $i <= $pagination->totalPage(); $i++) {
                                if($i == $page) {
                                    echo "<li class=\"active\">";
                                    echo "<span aria-hidden=\"true\">";
                                    echo "{$i}";
                                    echo "</span>";
                                    echo "</li>";
                                }else {
                                    echo "<li class=\"\">";
                                    echo "<a href=\"index.php?pg=";
                                    echo "{$i}";
                                    echo "\">";
                                    echo "<span aria-hidden=\"true\">";
                                    echo "{$i}";
                                    echo "</span>";
                                    echo "</a>";
                                    echo "</li>";
                                }
                            }
                            
                            if($pagination->hasNextPage()) {
                                echo "<li class=\"disabled\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getNextPage();
                                echo "\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>";
                                echo "</li>";
                            }
                        }
                    ?>
                </ul>
                <?php if($total_count == 0): ?>
                    <p><?php echo "Oops! Currently No result found!  <strong>".$total_count." item returned.</strong>"; ?></p>
                <?php elseif($total_count >= 1):?>
                    <p><?php echo "Showing ".$pagination->getFirstItem()." to ".$pagination->getLastItem() ." of ".$total_count." entries."; ?></p>
                <?php endif;?>            </div>
            <nav aria-label="...">
                <ul class="pager">
                    <?php 
                        if($pagination->totalPage() > 1) {
                            if($pagination->hasPreviousPage()) {
                                echo "<li class=\"previous\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getPreviousPage();
                                echo "\"><span aria-hidden=\"true\">&larr;</span> Older</a>";
                                echo "</li>";
                            }
                            
                            if($pagination->hasNextPage()) {
                                echo "<li class=\"next\">";
                                echo "<a href=\"index.php?pg=";
                                echo $pagination->getNextPage();
                                echo "\"><span aria-hidden=\"true\">&rarr;</span> Newer</a>";
                                echo "</li>";
                            }
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    
</div>