<?php
session_start();
include 'phpAPI.php';

$form = $_POST['form'];
$semester = $_POST['semester'];

error_reporting(0);

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
		<div class='form'>
		<?php

			$letter = substr($form, -1);
			$type = substr($form, -5,3);

			$letter = strtoupper($letter);
			$type = strtoupper($type);

			$results = getStats($letter, $type, $semester);

			if(count($results) < 1){
				header("Location: empty.php");
			}

			$stats = array(array());

			//get the stats for each class of an outcome and combine them

			for($i=0; $i< count($results); $i++){
				for($j=0; $j< count($results[$i][$type . 'Results']); $j++){

					$stats[$letter . strval($j+1)]['weak'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][0];

					$stats[$letter . strval($j+1)]['poor'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][1];

					$stats[$letter . strval($j+1)]['good'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][2];

					$stats[$letter . strval($j+1)]['excellent'] += $results[$i][$type . 
					'Results'][$letter . strval($j+1)][3];

					$stats[$letter . strval($j+1)]['rowTotal'] = $stats[$letter . 
					strval($j+1)]['excellent'] + 
					$stats[$letter . strval($j+1)]['good'] + $stats[$letter . 
					strval($j+1)]['poor'] + 
					$stats[$letter . strval($j+1)]['weak'];
				}
			}
			$descriptions = getRubricDescriptions($letter, $type);

			echo '<h3>' . $type . '-' . $letter . '</h3>';

			echo '<h5>Outcome: <strong>' . getDescription($letter, $type) . '</strong>
						</h5>';

		?>

		<table>
			<tr>
				<th></td>
				<th>1(weak)</td>
				<th>2(poor)</td>
				<th>3(good)</td>
				<th>4(excellent)</td>
				<th>%S+E</td>
			</tr>
			<?php

			//display the stats as percentages in a table
				for($i=1; $i< count($stats); $i++){
					echo "<tr>";
					echo "<td>" . $descriptions[$i-1] . "</td>";

					echo "<td>" . ($stats[$letter . strval($i)]['weak']/
					$stats[$letter . strval($i)]['rowTotal']) *100 . "%</td>";

					echo "<td>" . ($stats[$letter . strval($i)]['poor']/
					$stats[$letter . strval($i)]['rowTotal'])*100 . "%</td>";

					echo "<td>" . ($stats[$letter . strval($i)]['good']/
					$stats[$letter . strval($i)]['rowTotal'])*100 . "%</td>";

					echo "<td>" . ($stats[$letter . strval($i)]['excellent']/
					$stats[$letter . strval($i)]['rowTotal'])*100 . "%</td>";

					$excellent = ($stats[$letter . strval($i)]['excellent']/
					$stats[$letter . strval($i)]['rowTotal'])*100;

					$good = ($stats[$letter . strval($i)]['good']/
					$stats[$letter . strval($i)]['rowTotal'])*100;

					echo "<td>" . ($good+$excellent) . "%</td>";
					
					echo "</tr>";
				}
			?>
		</table>
		<button id="btn">Go Back</button>
		<script type="text/javascript">
    document.getElementById("btn").onclick = function () {
        location.href = "admin.php";
    };
</script>
	</div>
	</body>
</html>
