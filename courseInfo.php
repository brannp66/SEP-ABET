<?php
	include 'phpAPI.php';
  //include 'semesterChoice.php';

	$course = $_POST['course'];

	$studentList = getStudents($course, 'coyle', $_POST['semester']);

  $studentListCAC = $studentList[0];
  $studentListEAC = $studentList[1];

  $courseInfo = getCourseNameAndOutcomes($course['course']);

  $courseName = $courseInfo[0];
  $CACOutcomes = $courseInfo[1];
  $EACOutcomes = $courseInfo[2];

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
    <?php
      echo sprintf('Course Name: %s, CAC Students: %s, EAC Students: %s, CAC Outcomes: %s, EAC Outcomes: %s',
        $courseName, $studentListCAC, $studentListEAC, $CACOutcomes, $EACOutcomes);

    ?>


  </body>


 </html>
