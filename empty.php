<?php
session_start();
include 'phpAPI.php';

error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ABET Accredidation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
	<body>
		<h1>There doesn't seem to be any data for that outcome + semester</h1>
		<button id="btn">Go Back</button>
		<script type="text/javascript">
		    document.getElementById("btn").onclick = function () {
		        location.href = "admin.php";
		    };
		</script>
	</body>
</html>
