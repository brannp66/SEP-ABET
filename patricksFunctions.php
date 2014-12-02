<?php
class Form {
	public function Form($instructor, $semester, $courseId, $courseName, $studentsCAC, $studentsEAC, $rubrics, $description) {
		$this->instructor = $instructor;
		$this->semester = $semester;
		$this->courseId = $courseId;
		$this->courseName = $courseName;
		$this->studentsCAC = $studentsCAC;
		$this->studentsEAC = $studentsEAC;
		$this->rubrics = $rubrics;
		$this->description = $description;
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
}

function getDescription($letter, $type) {
	$m = new MongoClient(); //connect
	$db = $m->selectDB("ABET");

	$outcomes = new MongoCollection($db, 'Outcomes');
	$conditions = array('$and' => array(array('letter' => $letter), array('type' => $type)));

	$result = $outcomes->findOne($conditions);

	return $result['description'];
}

$testInstructor = "coyle";
$testSemester = "Fall2014";
$testCourseId = "cse3342";
$testCourseName = "Programming Languages";
$testCAC = array("roolo berger", "marcy klaust");
$testEAC = array("wilfred barry", "maximillian schell");
$testRubrics = array("rubric 1", "rubric 2");
$testDescription = "test description";
$testForm = new Form($testInstructor, $testSemester, $testCourseId, 
										 $testCourseName, $testCAC, $testEAC, $testRubrics,
										 $testDescription);
echo json_encode($testForm);

$testGetDescription = getDescription("A", "CAC");

echo $testGetDescription;

?>