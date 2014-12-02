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

	$client = new MongoClient();
	$db = $client->selectDB('ABET');

	$allCourses = new MongoCollection($db, 'ClassRoster');

	$conditions = array('$and' => array(array('semester' => $semester),
		array('instructor' => $instructor), array('course' => $courseID)));

	$result = $allCourses->findOne($conditions);

	$studentsCAC = $result['studentsCAC'];
	$studentsEAC = $result['studentsEAC'];

	$studentList = array($studentsCAC, $studentsEAC);
	return $studentList;
}


function getCourseNameAndOutcomes($courseID){

	$client = new MongoClient();
	$db = $client->selectDB('ABET');

	$allCourseOutcomes = new MongoCollection($db, 'CourseOutcomes');

	$conditions = array('courseId' => $courseID);

	$result = $allCourseOutcomes->findOne($conditions);

	$courseName = $result['courseName'];

	if($result['CACOutcomes'][0] != 'NULL')
		$CACOutcomes = $result['CACOutcomes'];
	else
		$CACOutcomes = NULL;

	if($result['EACOutcomes'][0] != 'NULL')
		$EACOutcomes = $result['EACOutcomes'];
	else
		$EACOutcomes = NULL;

	$courseInfo = array($courseName, $CACOutcomes, $EACOutcomes);

	return $courseInfo;

}

function getMeasuredOutcomes($semester, $courseId){

	$client = new MongoClient();
	$db = $client->selectDB('ABET');

	$allCourseOutcomes = new MongoCollection($db, 'CourseOutcomes');
	$allCycles = new MongoCollection($db, 'CycleOfOutcomes');

	$courseConditions = array('courseId' => $courseId);
	$cycleConditions = array('semester' => $semester);

	$courseOutcomes = $allCourseOutcomes->findOne($courseConditions);
	$cycleOutcomes = $allCycles->findOne($cycleConditions);

	$cac = array();
	$eac = array();

	if($courseOutcomes['CACOutcomes'][0] != NULL){
		foreach($courseOutcomes['CACOutcomes'] as $course){
			foreach($cycleOutcomes['CACOutcomes'] as $cycle){
				if($course == $cycle)
					array_push($cac, $course);
			}
		}
	}
	if($courseOutcomes['EACOutcomes'][0] != NULL){
		foreach($courseOutcomes['EACOutcomes'] as $course){
			foreach($cycleOutcomes['EACOutcomes'] as $cycle){
				if($course == $cycle)
					array_push($eac, $course);
			}
		}
	}

	$commonOutcomes = array($cac, $eac);

	return $commonOutcomes;
}






?>