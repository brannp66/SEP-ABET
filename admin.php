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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
  
		<script>
    	function getOutcomes(str) {
    		//leave options blank if nothing selected
				if(str=="") {
					document.getElementById("OutcomeForms").innerHTML = "";
					return;
				}
				else
				{
					//default xmlhttp request
					if (window.XMLHttpRequest)
					{
						xmlhttp = new XMLHttpRequest();
					}
					//http request for old ie
					else
					{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("OutcomeForms").innerHTML=xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","getCycle.php?s="+str,true);
					xmlhttp.send();
				}
			}
		</script>
  </head>

	<body>
		<form action='stats.php' method = 'POST' id='form'>
			<div class='choose'>
				<h1>Choose Outcome</h1>				
				<div class='dropdown'>
					<select name = 'semester' onchange="getOutcomes(this.value)">
						<option value="" disabled selected style='display:none;'>
							Select Semester
						</option>
						<option value="Fall2014">Fall 2014</option>
						<option value="Spring2015">Spring 2015</option>
						<option value="Fall2015">Fall 2015</option>
						<option value="Spring2016">Spring 2016</option>
						<option value="Fall2016">Fall 2016</option>
						<option value="Spring2017">Spring 2017</option>
					</select>
				</div>
				<div id = "OutcomeForms">
	 			</div>
	 		</div>
		</form>
	</body>
</html>
