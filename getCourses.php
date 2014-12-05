<?php
include 'phpAPI.php';
$semester = $_GET['s'];
$instructor = $_GET['i'];
$courseList = getCourseList($instructor, $semester);

echo "<select name = 'course'onchange='toggleButton(this.value)'>
			<option value='' disabled selected style='display:none;'>
		  Select Course</option>";
foreach($courseList as $course){
 	echo sprintf('<option value="%s">%s</option>', $course['course'],
 							 $course['course']);
}
echo "</select>";

?>