<?php
session_start();
$_SESSION['instructor'] = "coyle";
include 'phpAPI.php';
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
		<form action='chooseCourse.php' method="POST">
			<select name = 'semester'>
				<option value="Fall2014">Fall 2014</option>
				<option value="Spring2015">Spring 2015</option>
				<option value="Fall2015">Fall 2015</option>
				<option value="Spring2016">Spring 2016</option>
				<option value="Fall2016">Fall 2016</option>
				<option value="Spring2017">Spring 2017</option>
				<option value="Fall2017">Fall 2017</option>

			</select>
			<input type='submit' value='Choose'>
		</form>
	</body>
</html>
