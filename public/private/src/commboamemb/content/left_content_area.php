<div class="col-md-4">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Add Committee And Board Members</h2>
        </div>
        <div class="panel-body">
            <form action="actioncommem.php" method="post">
                <div class="form-row">

                    <div class="form-group">
                        <label for="memb_fname" class="sr-only"></label>
                        <input type="text" class="form-control" id="memb_fname"name="memb_fname" placeholder="Firstname" value="<?php if(isset($_SESSION['memb_fname'])) { echo $_SESSION['memb_fname']; } ?>">
                    </div>

                    <div class="form-group">
                        <label for="memb_mname" class="sr-only"></label>
                        <input type="text" class="form-control" id="memb_mname"name="memb_mname" placeholder="Middlename" value="<?php if(isset($_SESSION['memb_mname'])) { echo $_SESSION['memb_mname']; } ?>">
                    </div>

                    <div class="form-group">
                        <label for="memb_lname" class="sr-only"></label>
                        <input type="text" class="form-control" id="memb_lname"name="memb_lname" placeholder="Lastname" value="<?php if(isset($_SESSION['memb_lname'])) { echo $_SESSION['memb_lname']; } ?>">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="input-group-text" for="memb_gender_id">Gender</label>
                            </span>
                            <select class="form-control" id="memb_gender_id" name="memb_gender_id">
                                <option selected>Choose...</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="memb_email" class="sr-only"></label>
                        <input type="text" class="form-control" id="memb_email"name="memb_email" placeholder="Email" value="<?php if(isset($_SESSION['memb_email'])) { echo $_SESSION['memb_email']; } ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="memb_phone" class="sr-only"></label>
                        <input type="text" class="form-control" id="memb_phone"name="memb_phone" placeholder="Phone number e.g: 0757870022" value="<?php if(isset($_SESSION['memb_phone'])) { echo $_SESSION['memb_phone']; } ?>">
                    </div>

                    <div class="form-group">
                        <label for="memb_passcode" class="sr-only"></label>
                        <input type="password" class="form-control" id="memb_passcode"name="memb_passcode" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                        <label for="memb_confirm_passcode" class="sr-only"></label>
                        <input type="password" class="form-control" id="memb_confirm_passcode"name="memb_confirm_passcode" placeholder="Confirm Password">
                    </div>
                    
                    <div class="hidden form-group">
                        <label for="memb_prof" class="sr-only"></label>
                        <input type="text" class="form-control" id="memb_prof" name="memb_prof" placeholder="memb_prof">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="input-group-text" for="memb_role">Role</label>
                            </span>
                            <select class="form-control" id="memb_role" name="memb_role">
                                <option>Choose...</option>
                                <option value="committee">Committee Members</option>
                                <option value="board">Board Members</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="checkbox"></div>
                <div class="clearfix">
                    <button class="btn btn-primary pull-right" type="submit" name="add_member">Register User</button>
                </div>
            </form>
        </div>
    </div>
</div>

