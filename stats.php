<?php
session_start();
include 'phpAPI.php';

$form = $_POST['form'];
$semester = 'Spring2015';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ABET Accredidation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
	<body>
		<?php

			$letter = substr($form, -1);
			$type = substr($form, -5,3);

			$letter = strtoupper($letter);
			$type = strtoupper($type);

			$results = getStats($letter, $type, $semester);

			$stats = array(array());

			for($i=0; $i< count($results); $i++){
				for($j=0; $j< count($results[$i][$type . 'Results']); $j++){

					$stats[$letter . strval($j+1)]['poor'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][0];

					$stats[$letter . strval($j+1)]['satisfactory'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][1];

					$stats[$letter . strval($j+1)]['good'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][2];

					$stats[$letter . strval($j+1)]['excellent'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][3];
				}
			}

			foreach($stats as $stat){
				foreach($stat as $col){
					echo $col;
				}
			}
		?>
	</body>
</html>
