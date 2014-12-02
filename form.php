<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Outcome Sheet</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="generateForm.js"></script>
		<link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
   	<!--<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>-->
	</head>
	<body>
		<script type='text/javascript'>generateForm(<?php echo $_POST['form'] ?>);</script>
	</body>
</html>