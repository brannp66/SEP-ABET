var majors =
							{
								"major": [
									"Computer Science",
									"Computer Engineering"
								]
							}

var TEMP_COURSE = "CSE 4345-801";
var TEMP_SEMESTER = "Fall 2014"
var TEMP_INSTRUCTOR = "Frank Coyle";
var TEMP_OUTCOME = 
								{
							    "letter": "c",
							    "description": "An ability to design, implement, and evaluate a computer-based system, process, component, or program to meet desired needs",
							    "PerformanceCriteria": [
							      "Develop design requirements from the problem statement that meet desired needs",
							      "Identify relevant, realistic design constraints from the design requirements",
							      "Produce a design that satisfies design requirements within relevant, realistic constraints"
							    ]
							  };
var TEMP_STUDENTS = 
								{
    					    "students": [
    					      {
        				    	"CS": [
        				    		"Ferrante",
        					  		"Franjac",
        					  		"Gambino",
        					  		"Hodges",
        					  		"Horst",
        					  		"Kim",
        					  		"Meng",
        					  		"Roberts",
        					  		"Vickers"
        					  	]
        					  },
        					  {
        					  	"CpE": [
        					  		"Appel",
        					  		"Halac",
        					  		"Meng"
        					  	]	
        					  }
    						  ]
							  }

$( document ).ready(function() {
	var headerDiv = getHeaderDiv(TEMP_COURSE, TEMP_SEMESTER, TEMP_INSTRUCTOR, TEMP_OUTCOME);
	document.body.appendChild(headerDiv);

	var i = 0;
	for(var major in majors.major){
		var tableDiv = getTableDiv(majors.major[major], TEMP_OUTCOME, TEMP_STUDENTS.students[i++]);
		document.body.appendChild(tableDiv);
	}

	var basisDiv = getBasisDiv();
	document.body.appendChild(basisDiv);

});

var getHeaderDiv = function(course, semester, instructor, outcome) {
	var header = document.createElement("div");

	var courseElement = document.createElement("h3");
	var semesterElement = document.createElement("h3");
	var instructorElement = document.createElement("h5");
	var dateElement = document.createElement("h5");
	var dateInput = document.createElement("INPUT");
	var todaysDate = getTodaysDate();
	var outcomeElement = document.createElement("h5");

	courseElement.innerHTML = course;
	semesterElement.innerHTML = semester;
	instructorElement.innerHTML = "Instructor: " + instructor;
	dateElement.innerHTML = "Date: ";
	dateInput.setAttribute("type", "date");
	dateInput.setAttribute("value", todaysDate);
	outcomeElement.innerHTML = "Outcome: " + outcome.description;

	dateElement.appendChild(dateInput);

	header.appendChild(courseElement);
	header.appendChild(semesterElement);
	header.appendChild(instructorElement);
	header.appendChild(dateElement);
	header.appendChild(outcomeElement);

	return header;
}

var getTableDiv = function(major, outcome, students) {	
	var tableDiv = document.createElement("div");
	var description = document.createElement("h4");
	var table = getTable(outcome.PerformanceCriteria);
	var studentList = getStudentListElement(students);

	description.innerHTML = major;

	tableDiv.appendChild(description);
	tableDiv.appendChild(table);
	tableDiv.appendChild(studentList);

	return tableDiv;	
}

var getTable = function(criteria) {
	var table = document.createElement("table");

	table.appendChild(getTableHeader());

	for(var i = 0; i < criteria.length; i++) {
		var row = document.createElement("tr");
		var cell = document.createElement("td");
		cell.innerHTML = criteria[i];
		row.appendChild(cell);
		for(var j = 0; j < 4; j++) {
			cell - document.createElement("td");
			row.appendChild(cell);
		}
		table.appendChild(row);
	}
	return table;
}

var getTableHeader = function() {
	var row = document.createElement("tr");

	var data = document.createElement("td");
	row.appendChild(data);

	var data = document.createElement("td");
	data.appendChild(document.createTextNode('1 (weak)'));
	row.appendChild(data);

	var data = document.createElement("td");
	data.appendChild(document.createTextNode('2 (poor)'));
	row.appendChild(data);

	var data = document.createElement("td");
	data.appendChild(document.createTextNode('3 (good)'));
	row.appendChild(data);

	var data = document.createElement("td");
	data.appendChild(document.createTextNode('4 (excellent)'));
	row.appendChild(data);

	return row;
}

var getStudentListElement = function(studentList) {
	var major = Object.keys(studentList);
	var listElement = document.createElement("p");
	listElement.innerHTML = major + " Students: ";
	for(var i = 0; i < studentList[major].length; i++) {
		listElement.innerHTML += studentList[major][i] + ", ";
	}

	//slice off trailing comma
	listElement.innerHTML = listElement.innerHTML.slice(0,-2);

	return listElement;
}

var getTodaysDate = function() {
	var date  = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (day < 10) day = "0" + day;
	if (month < 10) month = "0" + month;

	var today = year + "-" + month + "-" + day;

	return today;
}

var getBasisDiv = function () {
	var basis = document.createElement("div");
	var label = document.createElement("h3");
	var input = document.createElement("INPUT");
	var note = document.createElement("h6");

	label.innerHTML = "The above evaluation is based on:";
	note.innerHTML = "This can be a project, an assignment or homework. Please list above – or provide reference to the basis of evaluation (e,g, Assignment 2, Exam – question 5, etc.)";

	basis.appendChild(label);
	basis.appendChild(input);
	basis.appendChild(note);

	return basis;
}