<div class="col-md-5">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Creating System Users</h2>
        </div>
        <div class="panel-body">
            <form action="actionsu.php" method="post">
                <div class="form-row">
                    <?php $departments = Department::getAll(); ?>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="input-group-text" for="su_dept_id">Departments</label>
                            </span>
                            <select class="form-control" id="su_dept_id" name="su_dept_id">
                                <option selected>Choose...</option>
                                <?php foreach($departments as $department): ?>
                                <option value="<?php echo $department->id; ?>"> <?php echo $department->name; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="su_firstname" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_firstname"name="su_firstname" placeholder="Firstname" value="<?php if(isset($_SESSION['su_firstname'])) { echo $_SESSION['su_firstname']; } ?>">
                    </div>

                    <div class="form-group">
                        <label for="su_middlename" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_middlename"name="su_middlename" placeholder="Middlename" value="<?php if(isset($_SESSION['su_middlename'])) { echo $_SESSION['su_middlename']; } ?>">
                    </div>

                    <div class="form-group">
                        <label for="su_lastname" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_lastname"name="su_lastname" placeholder="Lastname" value="<?php if(isset($_SESSION['su_lastname'])) { echo $_SESSION['su_lastname']; } ?>">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="input-group-text" for="su_gender_id">Gender</label>
                            </span>
                            <select class="form-control" id="su_gender_id" name="su_gender_id">
                                <option selected>Choose...</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="su_email" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_email"name="su_email" placeholder="Email" value="<?php if(isset($_SESSION['su_email'])) { echo $_SESSION['su_email']; } ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="su_phonenumber" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_phonenumber"name="su_phonenumber" placeholder="Phone number e.g: 0757870022" value="<?php if(isset($_SESSION['su_phonenumber'])) { echo $_SESSION['su_phonenumber']; } ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="su_username" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_username"name="su_username" placeholder="Username" value="<?php if(isset($_SESSION['su_username'])) { echo $_SESSION['su_username']; } ?>">
                    </div>

                    <div class="form-group">
                        <label for="su_password" class="sr-only"></label>
                        <input type="password" class="form-control" id="su_password"name="su_password" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                        <label for="su_confirm_password" class="sr-only"></label>
                        <input type="password" class="form-control" id="su_confirm_password"name="su_confirm_password" placeholder="Confirm Password">
                    </div>

                    <div class="hidden form-group">
                        <label for="su_token" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_token" name="su_token" placeholder="su_token">
                    </div>
                    
                    <div class="hidden form-group">
                        <label for="su_prof_img" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_prof_img" name="su_prof_img" placeholder="su_prof_img">
                    </div>

                    <div class="hidden form-group">
                        <label for="su_status" class="sr-only"></label>
                        <input type="text" class="form-control" id="su_status"name="su_status" placeholder="su_status" value="unverified">
                    </div>

                    <div class="hidden form-group">
                        <label for="created_by" class="sr-only"></label>
                        <input type="text" class="form-control" id="created_by"name="created_by" placeholder="created_by" value="<?php echo $_SESSION['currentUID']; ?>">
                    </div>

                    <?php $roles = Role::getAll(); ?>
                    <div class="hidden form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="input-group-text" for="su_role_id">Departments</label>
                            </span>
                            <select class="form-control" id="su_role_id" name="su_role_id">
                                <?php foreach($roles as $role): ?>
                                    <?php if($role->name == "Not assigned"):?>
                                        <option value="<?php echo $role->id; ?>"> <?php echo $role->name; ?> </option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="su_desc" class="sr-only"></label>
                    <textarea class="form-control" id="su_desc" name="su_desc" rows="3" placeholder="Description..."><?php if(isset($_SESSION['su_desc'])) { echo $_SESSION['su_desc']; } ?></textarea>
                </div>

                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" name="add_system_user">Create System User</button>
                </div>
            </form>
        </div>
    </div>
</div>

