<?php
include 'phpAPI.php';
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
    	<h1>Test</h1>

		<div class = "rubrics">
			<div class = "eac">
		    	<table>
		    		<tr>
		    			<td>Performance Indicators</td>
		    			<td>Unsatisfactory 1</td>
		    			<td>Developing 2</td>
		    			<td>Satisfactory 3</td>
		    			<td>Exemplary 4</td>
		    		</tr>
		    		<tr>
		    			<td>
		    			</td>
		    			<td>
		    				<input type="number" min="0" max="100" value="0">
		    			</td>
		    			<td>
		    				<input type="number" min="0" max="100" value="0">
		    			</td>
		    			<td>
		    				<input type="number" min="0" max="100" value="0">
		    			</td>
		    			<td>
		    				<input type="number" min="0" max="100" value="0">
		    			</td>

		    		</tr>



		    		<!-- code to generate the other rows -->

		    	</table>
			</div>

			<div class = "cac">
		    	<table>
		    		<tr>
		    			<td>Performance Indicators</td>
		    			<td>Unsatisfactory 1</td>
		    			<td>Developing 2</td>
		    			<td>Satisfactory 3</td>
		    			<td>Exemplary 4</td>
		    		</tr>
		    		<!-- code to generate the other rows -->

		    	</table>
			</div>
		</div>


		<form action='semesterChoice.php' method="POST">
			<select name = 'test'>
				<option value="Fall2014">Fall 2014</option>
				<option value="Spring2015">Spring 2015</option>
				<option value="Fall2015">Fall 2015</option>
				<option value="Spring2016">Spring 2016</option>
				<option value="Fall2016">Fall 2016</option>
				<option value="Spring2017">Spring 2017</option>
				<option value="Fall2017">Fall 2017</option>

			</select>
			<input type='submit' value='Choose'>
		</form>




		<?php

		/*

		$test = new MongoClient();
		$db = $test->selectDB('ABET');

		$classes = new MongoCollection($db, 'ClassRoster');

		$testQuery = array('course' => 'cse3342');

		$cursor = $classes->find($testQuery);

		

		$test2 = $classes->find(array('course' => 'cse3342'));

		foreach($test2 as $newOut){
			echo sprintf("Semester: %s, Course: %s, Instructor: %s, CAC: %s, EAC: %s", 
				$newOut['semester'], $newOut['course'], $newOut['instructor'], 
				$newOut['studentsCAC'][0], $newOut['studentsEAC'][0], PHP_EOL);
		}
*/

		?>



	</body>
</html>
