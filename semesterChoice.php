<?php
	include 'phpAPI.php';

	$semester = $_POST['test'];

	$_POST['semester'] = $semester;

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

  	<form action='courseInfo.php' method = 'POST'>
  		<select name = 'course'>
  			<?php
  				foreach($courseList as $course){
  					echo sprintf('<option value="%s">%s</option>', $course['course'], $course['course']);
  				}

  			?>
  		</select>
  		<input type='submit' value = "Select Course">
  	</form>



  </body>


 </html>
