<?php
session_start();

$data = array("semester" => $_SESSION['semester'], 
							"courseId" => $_SESSION['courseId'],
							"instructor" => $_SESSION['instructor'],
							"CACOutcome" => $_SESSION['CACOutcome'], 
							"EACOutcome" => $_SESSION['EACOutcome'],
							"basedOn" => $_POST['basedOn'],
);
$numRubrics = $_SESSION['numRubrics'];

if($data["CACOutcome"] && $data["EACOutcome"]) {
	$keys = array_keys($_POST);
	$CACOutcome = array();
	$EACOutcome = array();
	for($i = 0; $i < $numRubrics; $i++) {
		$CAC = getEntry($data['CACOutcome'], $i);
		$EAC = getEntry($data['EACOutcome'], $i);
		$CACOutcome[$CAC] = array();
		$EACOutcome[$EAC] = array();
		for($j = 0; $j < 4; $j++) {
			$keyIndex = ($i*4)+$j;
			$offset = 4*$numRubrics;
			array_push($CACOutcome[$CAC], $_POST[$keys[$keyIndex]]);
			array_push($EACOutcome[$EAC], $_POST[$keys[($keyIndex + $offset)]]);
		}
 	}
 	$data['CACResults'] = $CACOutcome;
 	$data['EACResults'] = $EACOutcome;
}
else if ($data["CACOutcome"]) {
	$keys = array_keys($_POST);
	$CACOutcome = array();
	for($i = 0; $i < $numRubrics; $i++) {
		$CAC = getEntry($data['CACOutcome'], $i);
		$CACOutcome[$CAC] = array();
		for($j = 0; $j < 4; $j++) {
			$keyIndex = ($i*4)+$j;
			array_push($CACOutcome[$CAC], $_POST[$keys[$keyIndex]]);
		}
	}
	$data['CACResults'] = $CACOutcome;
}
else if ($data["EACOutcome"]) {
	$keys = array_keys($_POST);
	$EACOutcome = array();
	for($i = 0; $i < $numRubrics; $i++) {
		$EAC = getEntry($data['EACOutcome'], $i);
		$EACOutcome[$EAC] = array();
		for($j = 0; $j < 4; $j++) {
			$keyIndex = ($i*4)+$j;
			array_push($EACOutcome[$EAC], $_POST[$keys[$keyIndex]]);
		}
	}
	$data['EACResults'] = $EACOutcome;
}

echo json_encode($data);

$m = new MongoClient(); //connect
$db = $m->selectDB("ABET");
$collection = new MongoCollection($db, 'Results');
$collection->insert($data);

header("Location: chooseSemester.php");

function getEntry($letter, $rubricNumber) {
	$entry = $letter . ($rubricNumber+1);
	return $entry;
}


?>