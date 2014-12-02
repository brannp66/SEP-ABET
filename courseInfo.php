<?php
	include 'phpAPI.php';
  //include 'semesterChoice.php';

	$course = $_POST['course'];


  $outcomes = getMeasuredOutcomes($_POST['semester'], $course);

  $cac = $outcomes[0];
  $eac = $outcomes[1];




/*
	$studentList = getStudents($course, 'coyle', $_POST['semester']);

  $studentListCAC = $studentList[0];
  $studentListEAC = $studentList[1];

  $courseInfo = getCourseNameAndOutcomes($course);

  $courseName = $courseInfo[0];
  $CACOutcomes = $courseInfo[1];
  $EACOutcomes = $courseInfo[2];*/

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



    foreach($cac as $cacOutcome){
      echo $cacOutcome . '<br />';
    }
    foreach($eac as $eacOutcome){
      echo $eacOutcome . '<br />';
    }
    /*
      echo sprintf('Course Name: %s, CAC Student1: %s, EAC Student1: %s, CAC Outcome1: %s, EAC Outcome1: %s',
        $courseName, $studentListCAC[0], $studentListEAC[0], $CACOutcomes[0], $EACOutcomes[0]);*/

    ?>


  </body>


 </html>
