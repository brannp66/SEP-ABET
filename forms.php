<?php
session_start();
error_reporting(0);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<title>Outcome Sheet</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="generateForm.js"></script>
		<link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<?php
	include 'phpAPI.php';

	$semester = $_SESSION['semester'];
	$courseId = $_POST['course'];
	$instructor = $_SESSION['instructor'];

	$forms = getForms($instructor, $semester, $courseId);

	foreach($forms as $form) {
		$jsonForm = json_encode($form);
		echo "<form method='POST' action='form.php'>";
		echo "<input type='hidden' name='form' value='".$jsonForm."'>";
		echo $form->getName() . "<input type='submit' value='Generate'>";
		echo "</form>";
	}
?>

</body>
</html>