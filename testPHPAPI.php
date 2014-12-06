<?php
include 'phpAPI.php';
error_reporting(0);

function testGetStats() {
	$letter = "A";
	$semester = "Spring2014";
	$type = "CAC";

	$expectedResult = "Is variable and is shown in the final
	results on the website";

	$result = getStats($letter, $semester, $type); 

	echo $expectedResult . ' <br />';
	echo $result . ' <br />';

	// if($result == $expectedResult) {
	// 	return "SUCCESS <br />";
	// }

	// else{
	// 	return "FAILURE <br />";
	// }
}

function testGetRubricDescriptions() {
	$letter = "A";
	$type = "CAC";
 
	$expectedResult="Able to apply math concepts to problems";

	$result = getRubricDescriptions($letter, $type);

	if($result[0] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetDescription() {
	$letter = "A";
	$type = "CAC";

	$expectedResult="An ability to apply knowledge of computing and 
	mathematics appropriate to the discipline";

	$result = getDescriptions($letter, $type);

	if($result == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetForms() {
	$instructor = "test";
	$semester = "Spring2015";
	$courseId = "testCourse";

	$expectedResult='Test Course';

	$result = getForms($instructor, $semester, $courseId);

	if($result[0]->getCourseName() == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetFormTypes() {
	$CACOutcomes = array("A", "H", "G");
	$EACOutcomes = array("A", "D", "G");

	$expectedResult="G";

	$result = getFormTypes($CACOutcomes, $EACOutcomes);

	if($result[0]['EAC'] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetCourseList() {
	$instructor = "test";
	$semester = "Spring2015";
	
	$expectedResult='testCourse';

	$result = getCourseList($instructor, $semester);

	if($result[0]['course'] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetStudents() {
	$instructor = "test";
	$semester = "Spring2015";
	$courseId = "testCourse";

	$expectedResult="roolo berger";

	$result = getStudents($courseId, $instructor, $semester);
	if($result[0][0] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetCourseNameAndOutcomes() {
	$courseId = "testCourse";

	$expectedResult="Test Course";

	$result = getCourseNameAndOutcomes($courseId);

	if($result[0] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetMeasuredOutcomes() {
	$semester = "Spring2015";
	$courseId = "testCourse";

	$expectedResult="A";

	$result = getMeasuredOutcomes($semester, $courseId);

	if($result[0][0] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}
}

function testGetSemesterOutcomes() {
	$semester = "Spring2015";

	$expectedResult="A";

	$result = getSemesterOutcomes($semester);

	if($result['CACOutcomes'][0] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}	
}

function testGetCourseOutcomes() {
	$courseId = "testCourse";

	$expectedResult="A";

	$result = getCourseOutcomes($courseId);

	if($result['CACOutcomes'][0] == $expectedResult) {
		return "SUCCESS <br />";
	}

	else{
		return "FAILURE <br />";
	}	
}

//echo "getStats: " . testGetStats() . "TEST <br/>" . "<br/>";
echo "getRubricDescriptions: " . testGetRubricDescriptions() . "<br/>";
echo "getDescription: " . testGetRubricDescriptions() . "<br/>";
echo "getForms: " . testGetForms() . "<br/>";
echo "getFormTypes: " . testGetFormTypes() . "<br/>";
echo "getCourseList: " . testGetCourseList() . "<br/>";
echo "getStudents: " . testGetStudents() . "<br/>";
echo "getCourseNameAndOutcomes: " . testGetCourseNameAndOutcomes() . "<br/>";
echo "getMeasuredOutcomes: " . testGetMeasuredOutcomes() . "<br/>";
echo "getSemesterOutcomes: " . testGetSemesterOutcomes() . "<br/>";
echo "getCourseOutcomes: " . testGetCourseOutcomes() . "<br/>";

?>