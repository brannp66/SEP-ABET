<?php
class Form {
	public function Form($instructor, $semester, $courseId, $courseName, $studentsCAC, $studentsEAC, $rubrics, $description, $CACOutcome, $EACOutcome) {
		$this->instructor = $instructor;
		$this->semester = $semester;
		$this->courseId = $courseId;
		$this->courseName = $courseName;
		$this->studentsCAC = $studentsCAC;
		$this->studentsEAC = $studentsEAC;
		$this->rubrics = $rubrics;
		$this->description = $description;
		$this->CACOutcome = $CACOutcome;
		$this->EACOutcome = $EACOutcome;
	}

	public function setInstructor($instructor) {
		$this->instructor = $instuctor;
	}

	public function setSemester($semester) {
		$this->semester = $semester;
	}

	public function setCourseId($courseId) {
		$this->courseId = $courseId;
	}

	public function setCourseName($courseName) {
		$this->courseName = $courseName;
	}

	public function setStudentsCAC($studentsCAC) {
		$this->studentsCAC = $studentsCAC;
	}

	public function setStudentsEAC($studentsEAC) {
		$this->studentsEAC = $studentsEAC;
	}

	public function setRubrics($rubrics) {
		$this->rubrics = $rubrics;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getInstructor() {
		return $this->instructor;
	}

	public function getSemester() {
		return $this->semester;
	}

	public function getCourseID() {
		return $this->courseId;
	}

	public function getCourseName() {
		return $this->courseName;
	}

	public function getStudentsCAC() {
		return $this->studentsCAC;
	}

	public function getStudentsEAC() {
		return $this->studentsEAC;
	}

	public function getRubrics() {
		return $this->rubrics;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getCACOutcome() {
		return $this->CACOutcome;
	}

	public function getEACOutcome() {
		return $this->EACOutcome;
	}
}

function getDescription($letter, $type) {
	$m = new MongoClient(); //connect
	$db = $m->selectDB("ABET");

	$outcomes = new MongoCollection($db, 'Outcomes');
	$conditions = array('$and' => array(array('letter' => $letter), array('type' => $type)));

	$result = $outcomes->findOne($conditions);

	return $result['description'];
}

function getForms($instructor, $semester, $courseId) {
	$forms = array();

	$courseInfo = getCourseNameAndOutcomes($courseId);
	$courseName = $courseInfo[0];
	
	$outcomes = getMeasuredOutcomes($semester, $courseId);
	$CACOutcomes = $outcomes[0];
	$EACOutcomes = $outcomes[1];

	$students = getStudents($courseId, $instructor, $semester);

	$formTypes = getFormTypes($CACOutcomes, $EACOutcomes);
	foreach($formTypes as $formType) {
		$name = "";
		if($formType['CAC']) {
			$studentsCAC = $students[0];
			$description = getDescription($formType['CAC'], "CAC");
			$CACOutcome = $formType['CAC'];
		}
		else {
			$studentsCAC = NULL;
			$CACOutcome = NULL;
			$description = getDescription($formType['EAC'], "EAC");
		}

		if($formType['EAC']) {
			$studentsEAC = $students[1];
			$EACOutcome = $formType['EAC'];
		}
		else {
			$studentsEAC = NULL;
			$EACOutcome = NULL;
		}

		$rubrics = $formType["rubrics"];

		$form = new Form($instructor, $semester, $courseId, $courseName, $studentsCAC, $studentsEAC, $rubrics, $description, $CACOutcome, $EACOutcome);
		array_push($forms, $form);
	}
	return $forms;
}

function getFormTypes($CACOutcomes, $EACOutcomes) {
	$forms = array();

	$m = new MongoClient(); //connect
	$db = $m->selectDB("ABET");

	$matches = new MongoCollection($db, 'EACandCACMatchups');
	$results = $matches->find();

	foreach($results as $result) {
		if(in_array($result['EAC'], $EACOutcomes) && in_array($result['CAC'], $CACOutcomes)) {
			$tempArray = array("CAC" => $result['CAC'], "EAC" => $result['EAC'], "rubrics" => $result['rubrics']);			array_push($forms, $tempArray);
		}
		else if(in_array($result['CAC'], $CACOutcomes)) {
			$tempArray = array("CAC" => $result['CAC'], "rubrics" => $result['rubrics']);
			array_push($forms, $tempArray);
		}
		else if(in_array($result['EAC'], $EACOutcomes)) {
			$tempArray = array("EAC" => $result['EAC'], "rubrics" => $result['rubrics']);
			array_push($forms, $tempArray);
		}
	}

	return $forms;
}

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