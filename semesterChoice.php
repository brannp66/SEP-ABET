<?php
	include 'phpAPI.php';

	$semester = $_POST['test'];

	$courseList = getCourseList('coyle', $semester);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ABET Accredidation</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src='js/testing.js'></script>
  </head>


  <body>

  	<form action='courseChoice.php' method = 'POST'>
  		<select name = 'courses'>
  			<?php
  				

  			?>




  		</select>
  		<input type='submit' value = "Select Course">
  	</form>



  </body>


 </html>
