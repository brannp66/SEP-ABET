<?php
include 'phpAPI.php';

function testGetStats() {
	$letter = "A";
	$semester = "Spring2014";
	$type = "CAC";

	$expectedResult = "";

	$result = getStats($letter, $semester, $CAC); 

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetRubricDescriptions() {
	$letter = "A";
	$type = "CAC";

	$expectedResult="";

	$result = $getRubricDescriptions($letter, $type);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetDescription() {
	$letter = "A";
	$type = "CAC";

	$expectedResult="";

	$result = $getDescriptions($letter, $type);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetForms() {
	$instructor = "test";
	$semester = "Spring2015";
	$courseId = "testCourse";

	$expectedResult="";

	$result = getForms($instructor, $semester, $courseId);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetFormTypes() {
	$CACOutcomes = array("A", "H", "G");
	$EACOutcomes = array("A", "D", "G");

	$expectedResult="";

	$result = getFormTypes($CACOutcomes, $EACOutcomes);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetCourseList() {
	$instructor = "test";
	$semester = "Spring2015";
	
	$expectedResult="";

	$result = getCourseList($instructor, $semester);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetStudents() {
	$instructor = "test";
	$semester = "Spring2015";
	$courseId = "testCourse";

	$expectedResult="";

	$result = getStudents($courseID, $instructor, $semester);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetCourseNameAndOutcome() {
	$courseId = "testCourse";

	$expectedResult="";

	$result = getCourseNameAndOutcomes($courseID);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetMeasuredOutcomes() {
	$semester = "Spring2015";
	$courseId = "testCourse";

	$expectedResult="";

	$result = getMeasuredOutcomes($semester, $courseId);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}
}

function testGetSemesterOutcomes() {
	$semester = "Spring2015";

	$expectedResult="";

	$result = getSemesterOutcomes($semester);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}	
}

function testGetCourseOutcomes() {
	$courseId = "testCourse";

	$expectedResult="";

	$result = getCourseOutcomes($courseId);

	if($result == $expectedResult) {
		echo "SUCCESS";
	}

	else{
		echo "FAILURE";
	}	
}

echo "getStats: " . testGetStats();
echo "getRubricDescriptions: " . testGetRubricDescriptions();
echo "getDescription: " . testGetRubricDescriptions();
echo "getForms: " . testGetForms();
echo "getFormTypes: " . testGetFormTypes();
echo "getCourseList: " . testGetCourseList();
echo "getStudents: " . testGetStudents();
echo "getCourseNameAndOutcomes: " . testGetCourseNameAndOutcomes();
echo "getMeasuredOutcomes: " . testGetMeasuredOutcomes();
echo "getSemesterOutcomes: " . testGetSemesterOutcomes();
echo "getCourseOutcomes: " . testGetCourseOutcomes();

?>