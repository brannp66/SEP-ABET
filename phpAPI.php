<?php

function getCourseList($instructor, $semester){
	$client = new MongoClient();
	$db = $client->selectDB('ABET');

	$allCourses = new MongoCollection($db, 'ClassRoster');

	$conditions = array('$and' => array(array('semester' => $semester), 
		array('instructor' => $instructor)));

	$results = $allCourses->find($conditions);

	$courseList = array();

	foreach($results as $result){
		array_push($courseList, $result);
	}


	return $courseList;
}

function getStudents($courseID, $instructor, $semester){
	/*




	*/


	$studentList = array('john', 'mary', 'james', 'waldo', 'nobody', 'mithranor', 'Dumbeldore');

	return $studentList;
}


function getCourseNameAndOutcomes($courseID){


	/*





	*/

	$testCourseOneCAC = array('a', 'b', 'e');
	$testCourseOneEAC = array('c', 'g');



	if($courseID == 1341){
		$courseName = "Java";
		$courseOutcomesCAC = array('a', 'b', 'e');
		$courseOutcomesEAC = array('c','g');
	}
	else{
		$courseName = "C++";
		$courseOutcomesCAC = array('c', 'g', 'i');
		$courseOutcomesEAC = array('C', 'h', 'k');
	}



	$courseInfo = array($courseName, $courseOutcomesCAC, $courseOutcomesEAC);

	return $courseInfo;
}








?>