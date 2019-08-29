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
        <link rel="stylesheet" href="./css/public.css">
        <link rel="stylesheet" href="css/tenders.css">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    </head>
    <body>
        <?php $siteBlueprint = SITE_ROOT.DS.'public'.DS.'template'; ?>
        <?php include_layout_template($siteBlueprint, 'major_header.php') ?>
        <?php include_layout_template($siteBlueprint, 'minor_header.php') ?>
        <div id="cainam-home" class="container">
            <div class="row slidfooter-lefer">
                <?php include_layout_template($siteBlueprint, 'left_side_content.php') ?>
                <?php include_layout_template($siteBlueprint, 'link_ongoing.php') ?>
            </div>
        </div>
        <div class="container-fluid d-flex p-2 justify-content-center footer-glare-background" style="background-color: #0090CF;">
        <?php include_layout_template($siteBlueprint, 'public_footer.php') ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
<?php if(isset($DBInstance)) { $DBInstance->closeDBConnection(); } ?>