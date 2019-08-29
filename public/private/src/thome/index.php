<?php require_once("../../../../imports/autoload.php"); ?>
<?php 
    $timeout = time() - $_SESSION['stk-currentTime'];
    if(!isset($_SESSION['stakeholder-uid'])) { 
        redirect_to("../../pubtend.php"); 
    }else if($timeout == 5) {
        unset($_SESSION['stakeholder-uid']);
        redirect_to("../../pubtend.php"); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" media="screen and (device-height: 600px)" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="icon" href="../../../assets/udsmpmis.ico" type="image/ico" sizes="16x16">
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/charts.css">
    <title>Admin: UDSM | PMIS</title>
</head>
<body>
    <div class="container-fluid admin-position">
        <div class="row">
            <?php $siteURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'src'.DS.'uhome'.DS.'content'; ?>
            <?php $siteBlueprint = SITE_ROOT.DS.'public'.DS.'private'.DS.'blueprint'; ?>
            <?php include_layout_template($siteBlueprint, 'nav_header.php') ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 valign-top cainam-scroll">
                        <?php include_layout_template($siteBlueprint, 'side_menu.php') ?>
                    </div>
                    <div class="col-md-9 valign-top cainam-charts">
                    <div id="message-div" class="message"><?php if(!empty($session->message)){ echo output_message($session->message); } ?></div>
                        <div class="row charts">
                            <div class="content-padding-left"> <?php include_layout_template($siteURL, 'chart1.php') ?> </div>
                            <!-- <div class="content-padding-right"> <?php include_layout_template($siteURL, 'chart2.php') ?> </div> -->
                        </div>
                        <div class="row charts">
                            <!-- <div class="content-padding-left"> <?php include_layout_template($siteURL, 'chart3.php') ?> </div> -->
                            <!-- <div class="content-padding-right"> <?php include_layout_template($siteURL, 'chart4.php') ?> </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="../../../js/main.js"></script>
    <script src="../../../js/userroles.js"></script>
</body>
</html>