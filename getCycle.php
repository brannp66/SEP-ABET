<?php
include 'phpAPI.php';
$semester = $_GET['s'];
$outcomeList = getSemesterOutcomes($semester);
//print_r($outcomeList['CACOutcomes']);
foreach($outcomeList['CACOutcomes'] as $outcome) {
	echo <button type="submit" value = 'cac=a' name='form' class='btn' disabled>CAC-A</button>
}
?>