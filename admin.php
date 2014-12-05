<?php
session_start();
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
		<div class='choose'>				<div class='dropdown'>
					<select name = 'semester' onchange="loadCourses(this.value)">
						<option value="" disabled selected style='display:none;'>Select Semester</option>
						<option value="Fall2014">Fall 2014</option>
						<option value="Spring2015">Spring 2015</option>
						<option value="Fall2015">Fall 2015</option>
						<option value="Spring2016">Spring 2016</option>
						<option value="Fall2016">Fall 2016</option>
						<option value="Spring2017">Spring 2017</option>
						<option value="Fall2017">Fall 2017</option>
					</select>
				</div>
				<div class='dropdown' id='courses'>
				</div>
		</div>

		<div id = "OutcomeForms">
			<form action='stats.php' method = 'POST'>
				<button type="submit" value = 'cac=a'>CAC-A</button>
				<button type="submit" value = 'cac=b'>CAC-B</button>
				<button type="submit" value = 'cac=c'>CAC-C</button>
				<button type="submit" value = 'cac=d'>CAC-D</button>
				<button type="submit" value = 'cac=e'>CAC-E</button>
				<button type="submit" value = 'cac=f'>CAC-F</button>
				<button type="submit" value = 'cac=g'>CAC-G</button>
				<button type="submit" value = 'cac=h'>CAC-H</button>
				<button type="submit" value = 'cac=i'>CAC-I</button>
				<button type="submit" value = 'cac=j'>CAC-J</button>
				<button type="submit" value = 'cac=k'>CAC-K</button>

				<button type="submit" value = 'eac=a'>EAC-A</button>
				<button type="submit" value = 'eac=b'>EAC-B</button>
				<button type="submit" value = 'eac=c'>EAC-C</button>
				<button type="submit" value = 'eac=d'>EAC-D</button>
				<button type="submit" value = 'eac=e'>EAC-E</button>
				<button type="submit" value = 'eac=f'>EAC-F</button>
				<button type="submit" value = 'eac=g'>EAC-G</button>
				<button type="submit" value = 'eac=h'>EAC-H</button>
				<button type="submit" value = 'eac=i'>EAC-I</button>
				<button type="submit" value = 'eac=j'>EAC-J</button>
				<button type="submit" value = 'eac=k'>EAC-K</button>

			</form>
		</div>
	</body>
</html>
