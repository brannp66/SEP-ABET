<?php

getCourseList($instructor, $semester){
	/*





	*/

	$testCourseOneName = "Java";
	$testCourseTwoName = "C++";

	$testCourseOneID = 1341;
	$testCourseTwoID = 1342;

	$testCourseOneCAC = array('a', 'b', 'e');
	$testCourseOneEAC = array('c', 'g');

	$testCourseTwoCAC = array('c', 'g', 'i');
	$testCourseTwoEAC = array('C', 'h', 'k');

	$testCourseOne = array($testCourseOneName, $testCourseOneID, $testCourseOneCAC, $testCourseOneEAC);
	$testCourseTwo = array($testCourseTwoName, $testCourseTwoID, $testCourseTwoCAC, $testCourseTwoEAC);

	$courseList = array($testCourseOne, $testCourseTwo);

	return $courseList;
}













?>