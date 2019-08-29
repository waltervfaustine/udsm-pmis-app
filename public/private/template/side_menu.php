<?php if(!isset($_SESSION['user_id'])){ redirect_to("../../auth/"); }?>
<?php 
    global $session; 
    if(isset($_SESSION['system_user_uid']) && isset($_SESSION['system_user_role']) && isset($_SESSION['system_user_role'])) {
        $tablename1 = "systemusers"; 
        $tablename2 = "roles"; 
        $roleID = $_SESSION['system_user_role']; 
        $UID = $_SESSION['system_user_uid']; 
        $userDATA = SystemUser::getLoggedInUserInfoByID($tablename1, $UID);
        $roleDATA = Role::getLoggedInRoleInfoByID($tablename2, $roleID);
        $_SESSION['currentRole'] = $roleDATA->name;
    }else {
        redirect_to('../../auth/');
    }
?>

<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <div class="user-profile-sidebar">
        <div class="user-profile-image"><img src="../../../assets/profile2.jpg" alt="user profile photo" width="20" height="20" class="img-circle img-responsive"></div>
        <div class="profile-user-info">
            <div class="profile-user-info-name"><?php echo $userDATA->fname." ".$userDATA->mname.". ".$userDATA->lname?> </div>
            <div class="profile-user-info-role"><?php echo $roleDATA->name; ?></div>
            <div class="profile-user-info-role">
            <?php $department = Department::getByID($userDATA->dept_id); ?>
            </div>
        </div>
        <div class="user-profile-setting">
            <a href="../user/"><button type="button" class="btn btn-primary btn-sm">Account</button></a>
            <button type="button" class="btn btn-success btn-sm"><?php echo $userDATA->status?></button>
        </div>

        <?php if($roleDATA->name == "UDSM Employee"): ?>
            <div class="user-profile-menu">
                <ul class="nav">
                    <li class="home"><a href="../uhome"><i class="glyphicon glyphicon-home"></i>Home </a></li>
                    <li>
                        <a href="../tenderreq/index.php?pg=1"><i class="glyphicon glyphicon-folder-open"></i>Submit Requirement</a>
                    </li>
                    <li>
                        <a href="../onofftenders/ongoing.php?pg=1"><i class="glyphicon glyphicon-hand-right"></i>Your Current Tenders</a>
                    </li>
                    <!-- <li>
                        <a href="../onofftenders/closed.php?pg=1"><i class="glyphicon glyphicon-hand-right"></i>Closed Tenders</a>
                    </li> -->
                    <li>
                        <a href="../onofftenders/closed.php?pg=1"><i class="glyphicon glyphicon-lock"></i>Closed Tenders</a>
                    </li>
                    <li>
                        <a href="../applicationtenders/emplo.php?pg=1"><i class="glyphicon glyphicon-pencil"></i>Tender Status & Progress</a>
                    </li>
                    <!-- <li>
                        <a href="../applicationtenders/index.php?pg=1"><i class="glyphicon glyphicon-pencil"></i>Received Tender Applications</a>
                    </li> -->
                    <!-- <li>
                        <a href="../commboassign/index.php?pg=1"><i class="glyphicon glyphicon-pencil"></i>List of Approved Tenders</a>
                    </li> -->

                    
                </ul>
            </div>
        <?php elseif($roleDATA->name == "PMU Officer"): ?>
            <div class="user-profile-menu">
                <ul class="nav">
                    <li class="home"><a href="../uhome"><i class="glyphicon glyphicon-home"></i>Home </a></li>
                    <li>
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="glyphicon glyphicon-briefcase"></i>Tenders</a>
                        <ul class="sub-menu collapse" id="collapseExample">
                            <li class="active"><a href="../tender/index.php?pg=1">Add Item & Tender Category</a></li>
                            <li><a href="../tenderstage/index.php?pg=1">Procurement Chain Stages</a></li>
                            <li><a href="../tenderform/index.php?pg=1">Upload Requirement Form</a></li>
                            <li><a href="../reqdetails/index.php?pg=1">Submitted Requirement Details</a></li>
                            <li><a href="../appunapptenders/index.php?pg=1">Approved & Unapproved Tenders</a></li>
                            <li><a href="../onofftenders/index.php?pg=1">Ongoing and Closed Tenders</a></li>
                            <li><a href="../onofftenders/ongoing.php?pg=1">Update Tender Progress</a></li>
                            <li><a href="../applicationtenders/apptend.php?pg=1">Received Applications & Award Winner</a></li>
                            <li><a href="../commboassign/index.php?pg=1">Tenders' Boards & Committee</a></li>
                            <li><a href="../tendererlist/index.php?pg=1">All PMIS Tenderers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../applicationtenders/apptend.php?pg=1"><i class="glyphicon glyphicon-folder-open"></i>Received Applications & Award Winner</a>
                    </li>

                    <li>
                        <a href="../tendererlist/index.php?pg=1"><i class="glyphicon glyphicon-user"></i>All PMIS Tenderers</a>
                    </li>

                    <li>
                        <a href="../onofftenders/ongoing.php?pg=1"><i class="glyphicon glyphicon-pencil"></i>Update Tender Status</a>
                    </li>

                    <li>
                        <a  href="../publicarea/index.php?pg=1"><i class="glyphicon glyphicon-paperclip"></i>Post News & Stories</a>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#logdata_section" aria-expanded="false" aria-controls="logdata_section"><i class="glyphicon glyphicon-stats"></i>Logs Data</a>
                        <ul class="sub-menu collapse" id="logdata_section">
                            <li class="active"><a href="../reglog/index.php?pg=1">Registration Data</a></li>
                            <li><a href="../loginlog/index.php?pg=1">Operational Data</a></li>
                        </ul>
                    </li>

                    <!-- <li><a href="#" target="_blank"><i class="glyphicon glyphicon-ok"></i>Users </a></li> -->
                    <li><a href="#"><i class="glyphicon glyphicon-flag"></i>Help </a></li>
                </ul>
            </div>
        <?php elseif($roleDATA->name == "Administrator"): ?>
            <div class="user-profile-menu">
                <ul class="nav">
                    <li class="home"><a href="../uhome"><i class="glyphicon glyphicon-home"></i>Home </a></li>
                    <!-- <li>
                        <a data-toggle="collapse" href="../publicarea/index.php?pg=1"><i class="glyphicon glyphicon-user"></i>Users</a>
                        <ul class="sub-menu collapse" id="users_section">
                            <li class="active"><a href="../sysuser/index.php?pg=1">Add Users & Assign Roles</a></li>
                            <li><a href="../idcard/index.php?pg=1">Add User Identification Type</a></li>
                        </ul>
                    </li> -->

                    <li>
                        <a  href="../sysuser/index.php?pg=1"><i class="glyphicon glyphicon-user"></i>Add Users & Assign Roles</a>
                    </li>

                    <li>
                        <a  href="../idcard/index.php?pg=1"><i class="glyphicon glyphicon-thumbs-up"></i>Add User Identification Type</a>
                    </li>

                    <li>
                        <a  href="../publicarea/index.php?pg=1"><i class="glyphicon glyphicon-paperclip"></i>Post News & Stories</a>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#logdata_section" aria-expanded="false" aria-controls="logdata_section"><i class="glyphicon glyphicon-stats"></i>Logs Data</a>
                        <ul class="sub-menu collapse" id="logdata_section">
                            <li class="active"><a href="../reglog/index.php?pg=1">Registration Data</a></li>
                            <li><a href="../loginlog/index.php?pg=1">Operational Data</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="glyphicon glyphicon-flag"></i>Help </a></li>
                </ul>
            </div>
        <?php elseif($roleDATA->name == "Accounting Officer"): ?>
            <div class="user-profile-menu">
                <ul class="nav">
                    <li class="home"><a href="../uhome"><i class="glyphicon glyphicon-home"></i>Home </a></li>

                    <li>
                        <a  href="../commboard/index.php?pg=1"><i class="glyphicon glyphicon-user"></i>Create Committee & Tender Board</a>
                    </li>
                    <li>
                        <a  href="../commboamemb/index.php?pg=1"><i class="glyphicon glyphicon-plus"></i>Add Members</a>
                    </li>
                    <li>
                        <a  href="../commboamemb/commem.php?pg=1"><i class="glyphicon glyphicon-share-alt"></i>Assign Committee Members</a>
                    </li>
                    <li>
                        <a  href="../commboamemb/boardmem.php?pg=1"><i class="glyphicon glyphicon-share-alt"></i>Assign Board Members</a>
                    </li>

                    <li>
                        <a href="../commboassign/accindex.php?pg=1"><i class="glyphicon glyphicon-pencil"></i>Add Committee/Board To Tender</a>
                    </li>

                    <li><a href="#"><i class="glyphicon glyphicon-flag"></i>Help </a></li>
                </ul>
            </div>
        <?php elseif($roleDATA->name == "Tenderer"): ?>
        <?php elseif($roleDATA->name == "Other"): ?>
        <?php endif; ?>
        
    </div>
</div>