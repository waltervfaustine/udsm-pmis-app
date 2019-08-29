<?php require_once("../imports/autoload.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
        <title>UDSM | PMIS</title>
        <link rel="icon" href="./assets/udsmpmis.ico" type="image/ico" sizes="16x16">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/public.css">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    </head>
    <body>
        <?php $siteBlueprintLayouts = SITE_ROOT.DS.'public'.DS.'layouts'.DS.'tenderreg'; ?>
        <?php $siteBlueprint = SITE_ROOT.DS.'public'.DS.'template'; ?>
        <?php include_layout_template($siteBlueprint, 'major_header.php') ?>
        <?php include_layout_template($siteBlueprint, 'other_minor_header.php') ?>
        <div class="container">
            <div class="row">
                <?php include_layout_template($siteBlueprint, 'left_side_content.php') ?>
                <?php include_layout_template($siteBlueprintLayouts, 'termsandconditions.php') ?>
            </div>
        </div>
        <div class="container-fluid d-flex p-2 justify-content-center footer-glare-background" style="background-color: #0090CF;">
        <?php include_layout_template($siteBlueprint, 'public_footer.php') ?>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="js/public_reg.js"></script>
    </body>
</html>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>