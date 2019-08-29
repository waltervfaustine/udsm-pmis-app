<?php if(!isset($_SESSION['user_id'])){ redirect_to("../../auth/"); }?>

<?php 
    global $session; 
    global $systemuser, $systemrole; 
    if(isset($_SESSION['system_user_uid']) && isset($_SESSION['system_user_role'])) {
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

<div class="navbar navbar-default navbar-fixed-top nav-background" id="navbar-blueprint" role="navigation">
    <div class="container-fluid"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a target="_blank" href="#" class="navbar-brand"><img src="../../../assets/cd-logo.svg" alt="user profile photo" width="150" height="20" class="img-responsive"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <!-- <li><a href="#">Inicio</a></li>
                <li class="active"><a href="#" target="_blank">Inspirado en este ejemplo</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">DropDown
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Link 2</a></li>
                    </ul>
                 </li>               -->
             </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <span><strong><?php echo $userDATA->fname; ?></strong></span>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class=" icon-size"> <img src="../../../assets/profile2.jpg" alt="user profile photo" width="150" height="150" class="img-circle img-responsive"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $userDATA->fname." ".$userDATA->mname." ".$userDATA->lname; ?></strong></p>
                                        <p class="text-left"><strong><?php echo $roleDATA->name; ?></strong></p>
                                        <p class="text-left small"><?php echo $userDATA->email; ?></p>
                                        <p class="text-left">
                                            <a href="../user/" class="btn btn-primary btn-block btn-sm">My Account Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="../../auth/logout/" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>



    