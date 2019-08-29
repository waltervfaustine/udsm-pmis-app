<div class="col-md-12">
    <div class="row-fluid user-infos cyruxx">
        <div class="span10 offset1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Current User Informations</h3>
                </div>
                <div class="panel-body">
                    <div class="row-fluid">
                    <div class="col-md-3">
                        <div class="span">
                            <img width="230" length="100" class="img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" alt="User Pic">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="span6">
                            <table class="table table-condensed table-responsive table-user-information">
                                <tbody>
                                    <tr>
                                        <td>System User Access Level:</td>
                                        <td><?php echo $_SESSION['stkrole'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fullname:</td>
                                        <td><?php echo $_SESSION['stkfname']." ".$_SESSION['stkmname']." ".$_SESSION['stklname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $_SESSION['stkemail'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td><?php echo $_SESSION['stkgender'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username:</td>
                                        <td><?php echo $_SESSION['stkusername'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Identification Card:</td>
                                        <td><?php echo $_SESSION['stkidentification'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Item Supply Category:</td>
                                        <td><?php echo $_SESSION['stkbusinessCategory'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Account Status:</td>
                                        <td>
                                            <button class="btn btn-success btn-xs" type="button"
                                                data-toggle="tooltip"
                                                data-original-title="Edit this user"> 
                                                <?php 
                                                    if(isset($_SESSION['stkverification'])) {
                                                        if($_SESSION['stkverification'] == 'verified') {
                                                            echo "Verified";
                                                        }else if($_SESSION['stkverification'] == 'unverified') {
                                                            echo "UNVerified";
                                                        }
                                                    } 
                                                ?>
                                                <i class="icon-edit icon-white"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Registered</td>
                                        <td><?php echo timeAgo($_SESSION['stkago']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Registered Since:</td>
                                        <td><?php echo $_SESSION['stksince'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn  btn-primary" type="button"
                            data-toggle="tooltip"
                            data-original-title="Send message to user"><i class="icon-envelope icon-white">Registered Since: <?php echo $_SESSION['stksince']; ?></i></button>
                    <span class="pull-right">
                        <button class="btn btn-success" type="button"
                                data-toggle="tooltip"
                                data-original-title="Edit this user">Account Status: 
                                <?php 
                                    if(isset($_SESSION['stkverification'])) {
                                        if($_SESSION['stkverification'] == 'verified') {
                                            echo "Verified";
                                        }else if($_SESSION['stkverification'] == 'unverified') {
                                            echo "UNVerified";
                                        }
                                    } 
                                ?>
                                <i class="icon-edit icon-white"></i></button>
                        <button class="btn btn-danger" type="button"
                                data-toggle="tooltip"
                                data-original-title="Remove this user">Item Supply Category: <?php echo $_SESSION['stkbusinessCategory']; ?><i class="icon-remove icon-white"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>