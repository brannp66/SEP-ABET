<?php
include 'phpAPI.php';
$semester = $_GET['s'];
$outcomeList = getSemesterOutcomes($semester);
//print_r($outcomeList['CACOutcomes']);

echo "<h3>CAC Outcomes</h3>";
foreach($outcomeList['CACOutcomes'] as $outcome) {
	echo "<button type='submit' value='CAC-" . $outcome . "' name='form' class='btn'>CAC-" . $outcome . "</button>";
}
echo "<h3>EAC Outcomes</h3>";
foreach($outcomeList['EACOutcomes'] as $outcome) {
	echo "<button type='submit' value='EAC-" . $outcome . "' name='form' class='btn'>EAC-" . $outcome . "</button>";
}

?>