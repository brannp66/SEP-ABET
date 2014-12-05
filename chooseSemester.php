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
      function loadCourses(str) {
        var instructor = <?php echo(json_encode($_SESSION['instructor'])); ?>;
        //leave options blank if nothing selected
        if(str=="") {
          document.getElementById("courses").innerHTML = "";
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
							document.getElementById("courses").innerHTML=xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","getCourses.php?s="+str+"&i="+instructor,true);
					xmlhttp.send();
				}
			}
			function toggleButton(str) {
				if(str==""){
					document.getElementById('btn').disabled=true;
				}
				else{
					document.getElementById('btn').disabled=false;
				}
			}
		</script>
  </head>
	<body>
		<div class='choose'>
			<h3>Select Semester and Course</h3>
			<form action='forms.php' method="POST">
				<div class='dropdown'>
					<select name = 'semester' onchange="loadCourses(this.value)">
						<option value="" disabled selected style='display:none;'>
							Select Semester
						</option>
						<option value="Fall2014">Fall 2014</option>
						<option value="Spring2015">Spring 2015</option>
						<option value="Fall2015">Fall 2015</option>
						<option value="Spring2016">Spring 2016</option>
						<option value="Fall2016">Fall 2016</option>
						<option value="Spring2017">Spring 2017</option>
						<option value="Fall2017">Fall 2017</option>
					</select>
				</div>
				<div class='dropdown' id='courses'>
				</div>
				<input type='submit' value='View Forms' class='button tiny' id='btn' disabled>
			</form>
		</div>
	</body>
</html>
