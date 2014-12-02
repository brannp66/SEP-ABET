<?php
session_start();

print_r($_SESSION);
print_r($_POST);

$data = array("semester" => $_SESSION['semester'], 
							"courseId" => $_SESSION['courseId'],
							"instructor" => $_SESSION['instructor'],
							"CACOutcome" => $_SESSION['CACOutcome'], 
							"EACOutcome" => $_SESSION['EACOutcome'],
							"basedOn" => $_POST['basedOn']);

for($i = 0; $i < count($_Post) - 1; $i++) {
	$key = key($_POST[$i]);
	if(substr($key,0,3) == "CAC") {
		
	}
}
?>