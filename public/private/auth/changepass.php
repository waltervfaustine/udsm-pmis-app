<?php require_once("../../../imports/autoload.php"); ?>

<?php 
    if(isset($_SESSION['user_id'])){ 
        redirect_to("../home/"); 
    }else if(isset($_SESSION['user_id']) && isset($_SESSION['email-status'])) {
        if($_SESSION['email-status'] == "unverified") {
            redirect_to("../auth/verification/"); 
        }
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<link rel="stylesheet" href="../../css/admin.css">
		<title> UDSM | PMIS </title>
	</head>
	<body class="text-center">
		<?php $siteURL = SITE_ROOT.DS.'public'.DS.'private'.DS.'auth'.DS.'layout'; ?>
		<?php include_layout_template($siteURL, 'change_password.php') ?>

		<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"crossorigin="anonymous"></script>
        <script src="../../js/main.js"></script>
		<script src="../../js/alert.js"></script>
	</body>
</html>

