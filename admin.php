<?php
session_start();
include 'phpAPI.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ABET Accredidation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  <script>
  //   	function toggleButton(str) {
  //   		var elements = document.getElementsByClassName("btn");
  //   		for(var i = 0; i < elements.length; i++){
		// 			if(str=="") {
		// 				elements[i].disabled = true;
		// 			}
		// 			else
		// 			{
		// 				elements[i].disabled = false;
		// 			}
		// 		}
		</script>
  
		<script>
    	function getOutcomes(str) {
				if(str=="") {
					document.getElementById("form").innerHTML = "";
					return;
				}
				else
				{
					if (window.XMLHttpRequest)
					{
						xmlhttp = new XMLHttpRequest();
					}
					else
					{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("form").innerHTML=xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","getCycle.php?s="+str,true);
					xmlhttp.send();
				}
			}
		</script>
  </head>

	<body>
		<div class='choose'>				
			<div class='dropdown'>
				<select name = 'semester' onchange="getOutcomes(this.value)">
					<option value="" disabled selected style='display:none;'>Select Semester</option>
					<option value="Fall2014">Fall 2014</option>
					<option value="Spring2015">Spring 2015</option>
					<option value="Fall2015">Fall 2015</option>
					<option value="Spring2016">Spring 2016</option>
					<option value="Fall2016">Fall 2016</option>
					<option value="Spring2017">Spring 2017</option>
					<option value="Fall2017">Fall 2017</option>
				</select>
			</div>
		</div>

		<div id = "OutcomeForms">
			<form action='stats.php' method = 'POST' id='form'>
<!-- 				<h1>CAC Results</h1>
				<button type="submit" value = 'cac=a' name='form' class='btn' disabled>CAC-A</button>
				<button type="submit" value = 'cac=b' name='form' class='btn' disabled>CAC-B</button>
				<button type="submit" value = 'cac=c' name='form' class='btn' disabled>CAC-C</button>
				<button type="submit" value = 'cac=d' name='form' class='btn' disabled>CAC-D</button>
				<button type="submit" value = 'cac=e' name='form' class='btn' disabled>CAC-E</button>
				<button type="submit" value = 'cac=f' name='form' class='btn' disabled>CAC-F</button>
				<button type="submit" value = 'cac=g' name='form' class='btn' disabled>CAC-G</button>
				<button type="submit" value = 'cac=h' name='form' class='btn' disabled>CAC-H</button>
				<button type="submit" value = 'cac=i' name='form' class='btn' disabled>CAC-I</button>
				<button type="submit" value = 'cac=j' name='form' class='btn' disabled>CAC-J</button>
				<button type="submit" value = 'cac=k' name='form' class='btn' disabled>CAC-K</button>
				<h1>EAC Results</h1>
				<button type="submit" value = 'eac=a' name='form' class='btn' disabled>EAC-A</button>
				<button type="submit" value = 'eac=b' name='form' class='btn' disabled>EAC-B</button>
				<button type="submit" value = 'eac=c' name='form' class='btn' disabled>EAC-C</button>
				<button type="submit" value = 'eac=d' name='form' class='btn' disabled>EAC-D</button>
				<button type="submit" value = 'eac=e' name='form' class='btn' disabled>EAC-E</button>
				<button type="submit" value = 'eac=f' name='form' class='btn' disabled>EAC-F</button>
				<button type="submit" value = 'eac=g' name='form' class='btn' disabled>EAC-G</button>
				<button type="submit" value = 'eac=h' name='form' class='btn' disabled>EAC-H</button>
				<button type="submit" value = 'eac=i' name='form' class='btn' disabled>EAC-I</button>
				<button type="submit" value = 'eac=j' name='form' class='btn' disabled>EAC-J</button>
				<button type="submit" value = 'eac=k' name='form' class='btn' disabled>EAC-K</button>
 -->
			</form>
		</div>
	</body>
</html>
