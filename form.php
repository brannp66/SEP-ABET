<?php
session_start();

include 'phpAPI.php';

$form = json_decode($_POST['form']);
$_SESSION['semester'] = $form->{'semester'};
$_SESSION['courseId'] = $form->{'courseId'};
$_SESSION['instructor'] = $form->{'instructor'};
$_SESSION['CACOutcome'] = $form->{'CACOutcome'};
$_SESSION['EACOutcome'] = $form->{'EACOutcome'};
$_SESSION['numRubrics'] = count($form->{'rubrics'});
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Outcome Sheet</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="generateForm.js"></script>
		<link rel="stylesheet" href="css/foundation.css" />
		<link rel="stylesheet" href="css/style.css" />
    <script src="js/vendor/modernizr.js"></script>
	</head>
	<body>
		<div class='form' id='form'> 

		</div>
		<script type='text/javascript'>generateForm(<?php echo $_POST['form'] ?>);</script>
	</body>
</html>