<?php require_once("../../../../imports/autoload.php"); ?>

<div class="col-md-8">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
        <h2 class="panel-title">Committee And Board Member Information</h2>
    </div>
    <?php
        global $DBInstance;
        $page = CommitteeBoardMembers::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
        $per_page = CommitteeBoardMembers::getRecordPerPage();
        $total_count = CommitteeBoardMembers::getCountAll();
    ?>
    <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
    <?php
        $result = CommitteeBoardMembers::findRecordsForThisPage($per_page, $pagination->getOffset());
        $members = CommitteeBoardMembers::getBySQL($result);
    ?>
        <div class="panel-body" id="member_content_area">
            <table class="table table-bordered table-hover">
                <div class="collapse" id="systemuser-update-collapse">
                    <div class="well">
                        <div class="panel-body">
                            <form action="actionsu.php" method="post">
                                <div class="form-row">
                                <?php $roles = Role::getAll(); ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <label class="input-group-text" for="collapse_su_role_id">Assign Role</label>
                                        </span>
                                        <select class="form-control" id="collapse_su_role_id" name="collapse_su_role_id">
                                            <option selected>Choose...</option>
                                            <?php foreach($roles as $role): ?>
                                            <option value="<?php echo $role->id; ?>"> <?php echo $role->name; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                    <?php $departments = Department::getAll(); ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label class="input-group-text" for="collapse_su_dept_id">Departments</label>
                                            </span>
                                            <select class="form-control" id="collapse_su_dept_id" name="collapse_su_dept_id">
                                                <option selected>Choose...</option>
                                                <?php foreach($departments as $department): ?>
                                                <option value="<?php echo $department->id; ?>"> <?php echo $department->name; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="collapse_su_firstname" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_firstname"name="collapse_su_firstname" placeholder="Firstname" value="<?php if(isset($_SESSION['collapse_su_firstname'])) { echo $_SESSION['collapse_su_firstname']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="collapse_su_middlename" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_middlename"name="collapse_su_middlename" placeholder="Middlename" value="<?php if(isset($_SESSION['collapse_su_middlename'])) { echo $_SESSION['collapse_su_middlename']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="collapse_su_lastname" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_lastname"name="collapse_su_lastname" placeholder="Lastname" value="<?php if(isset($_SESSION['collapse_su_lastname'])) { echo $_SESSION['collapse_su_lastname']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label class="input-group-text" for="collapse_su_gender_id">Gender</label>
                                            </span>
                                            <select class="form-control" id="collapse_su_gender_id" name="collapse_su_gender_id">
                                                <option selected>Choose...</option>
                                                <option value="F">Female</option>
                                                <option value="M">Male</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="collapse_su_email" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_email"name="collapse_su_email" placeholder="Email" value="<?php if(isset($_SESSION['collapse_su_email'])) { echo $_SESSION['collapse_su_email']; } ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="collapse_su_phonenumber" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_phonenumber"name="collapse_su_phonenumber" placeholder="Phone number e.g: 0757870022" value="<?php if(isset($_SESSION['collapse_su_phonenumber'])) { echo $_SESSION['collapse_su_phonenumber']; } ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="collapse_su_username" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_username"name="collapse_su_username" placeholder="Username" value="<?php if(isset($_SESSION['collapse_su_username'])) { echo $_SESSION['collapse_su_username']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="collapse_su_password" class="sr-only"></label>
                                        <input type="password" class="form-control" id="collapse_su_password"name="collapse_su_password" placeholder="Password">
                                    </div>

                                    <div class="hidden form-group">
                                        <label for="collapse_su_token" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_token" name="collapse_su_token" placeholder="collapse_su_token">
                                    </div>
                                    
                                    <div class="hidden form-group">
                                        <label for="collapse_su_prof_img" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_prof_img" name="collapse_su_prof_img" placeholder="collapse_su_prof_img">
                                    </div>

                                    <div class="hidden form-group">
                                        <label for="systemuser_id" class="sr-only"></label>
                                        <input type="text" class="form-control" id="systemuser_id" name="systemuser_id" placeholder="systemuser_id">
                                    </div>

                                    <div class="hidden form-group">
                                        <label for="collapse_su_status" class="sr-only"></label>
                                        <input type="text" class="form-control" id="collapse_su_status"name="collapse_su_status" placeholder="collapse_su_status">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="collapse_su_desc" class="sr-only"></label>
                                    <textarea class="form-control" id="collapse_su_desc" name="collapse_su_desc" rows="3" placeholder="Description..."><?php if(isset($_SESSION['collapse_su_desc'])) { echo $_SESSION['collapse_su_desc']; } ?></textarea>
                                </div>

                                <div class="checkbox"></div>
                                <div class="clearfix">
                                    <button class="btn btn-primary pull-right" type="submit" name="update_system_user">Update User Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="info text-center"><span class="glyphicon glyphicon-list-alt"></span></th>
                        <th class="info text-center">Firstname</th>
                        <th class="info text-center">Middle</th>
                        <th class="info text-center">Lastname</th>
                        <th class="info text-center">Gender</th>
                        <th class="info text-center">Phone</th>
                        <th class="info text-center">Role</th>
                        <th class="info text-center"><span class="glyphicon glyphicon-edit"></span></th>
                        <th class="info text-center"><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                    <?php foreach($members as $member): ?>
                    <?php global $DBInstance; ?>
                        <tr>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($counter); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->id); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($member->fname); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($member->mname); ?></td>
                            <td class=""><?php echo $DBInstance->HTMLEntitiesDecoding($member->lname); ?></td>
                            <?php if($member->gender == "F"): ?>
                                <td class="text-center"><?php echo "Female"; ?></td>
                            <?php else: ?>
                                <td class="text-center"><?php echo "Male"; ?></td>
                            <?php endif; ?>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->email); ?></td>
                            <td class="text-center"><?php echo $DBInstance->HTMLEntitiesDecoding($member->phone); ?></td>
                            <?php if($member->role_name == "committee"): ?>
                                <td class="text-center"><button type="button" class="btn btn-warning text-center btn-xs">Committee Members</button></td>
                            <?php elseif($member->role_name == "board"): ?>
                                <td class="text-center"><button type="button" class="btn btn-success text-center btn-xs">Board Members</button></td>
                            <?php endif; ?>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->passcode); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->user_desc); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->status); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->token); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->prof_img); ?></td>
                            <td class="hidden"><?php echo $DBInstance->HTMLEntitiesDecoding($member->id); ?></td>
                            
                            <td class="text-center">
                                <button type="button" class="btn btn-info text-center btn-xs system-user-edit-btn" data-toggle="collapse" data-target="#member-update-collapse" aria-expanded="false" aria-controls="member-update-collapse">
                                    Edit Info
                                </button>
                            </td>
                            <td class="text-center"><a href="actioncommem.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($member->id); ?>"><button type="button" class="btn btn-danger text-center btn-xs">Delete Info</button></a></td>
                        </tr>
                        <?php $counter = $counter + 1; ?>
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
                <?php endif;?>
            </div>
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