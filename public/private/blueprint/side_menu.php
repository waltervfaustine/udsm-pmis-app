<?php if(!isset($_SESSION['stakeholder-uid'])){ redirect_to("./pubtend.php"); }?>

<?php 
    if(isset($_SESSION['stakeholder-roleID']) && $_SESSION['stakeholder-uid']) {
        global $session; 
        $tablename = "stakeholders"; 
        $roleID = $_SESSION['stakeholder-roleID']; 
        $UID = $_SESSION['stakeholder-uid']; 
        $userDATA = StakeholderInfo::getLoggedInStakeholderInfoByID($tablename, $roleID, $UID);
    }
?>
<?php $fname = $userDATA->fname; $mname = $userDATA->mname; $lname = $userDATA->lname; ?>

<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <div class="user-profile-sidebar">
        <div class="user-profile-image"><img src="../../../assets/profile2.jpg" alt="user profile photo" width="20" height="20" class="img-circle img-responsive"></div>
        <div class="profile-user-info">
            <div class="profile-user-info-name"><?php echo $fname." ".$mname.". ".$lname?> </div>
            <div class="profile-user-info-role"><?php echo $userDATA->name; ?></div>
        </div>
        <div class="user-profile-setting">
            <a href="../../stk/stakeholder"><button type="button" class="btn btn-primary btn-sm">Account</button></a>
            <button type="button" class="btn btn-success btn-sm"><?php echo $userDATA->status; ?></button>
        </div>
        <div class="user-profile-menu">
            <ul class="nav">
                <li class="home"><a href="../../src/thome"><i class="glyphicon glyphicon-home"></i>Home </a></li>
                <li>
                    <a href="../../stk/appunapptenders/index.php?pg=1"><i class="glyphicon glyphicon-th-list"></i>List Of Tenders</a>
                </li>
                <li>
                    <a href="../../stk/yourtender/index.php?pg=1"><i class="glyphicon glyphicon-pencil"></i>Your Tenders</a>
                </li>
                <li>
                    <a href=""><i class="glyphicon glyphicon-triangle-right"></i>View Tender Progress</a>
                </li>
                <li>
                    <a href=""><i class="glyphicon glyphicon-list-alt"></i>Announced Tenders</a>
                </li>
                <li>
                    <a href=""><i class="glyphicon glyphicon-pencil"></i>Closed Tenders</a>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-flag"></i>Help </a></li>
            </ul>
        </div>
    </div>
</div>