$( document ).ready(function() {
	var form = {
    "instructor": "coyle",
    "semester": "Fall2014",
    "courseId": "cse3342",
    "courseName": "Programming Languages",
    "studentsCAC": [
        "roolo berger",
        "marcy klaust"
    ],
    "studentsEAC": [
        "wilfred barry",
        "maximillian schell"
    ],
    "rubrics": [
        "rubric 1",
        "rubric 2"
    ],
    "description": "test description"
}
	var headerDiv = getHeaderDiv(form);
	document.body.appendChild(headerDiv);

	if(form['studensCAC']) {
		var tableDiv = getCACTableDiv(form);
		document.body.appendChild(tableDiv);
	}
	if(form['studentsEAC']) {
		var tableDiv = getEACTableDiv(form);
		document.body.appendChild(tableDiv);
	}

	var basisDiv = getBasisDiv();
	document.body.appendChild(basisDiv);

});

var getHeaderDiv = function(form) {
	var header = document.createElement("div");

	var courseElement = document.createElement("h3");
	var semesterElement = document.createElement("h3");
	var instructorElement = document.createElement("h5");
	var dateElement = document.createElement("h5");
	var dateInput = document.createElement("INPUT");
	var todaysDate = getTodaysDate();
	var outcomeElement = document.createElement("h5");

	courseElement.innerHTML = form['courseId'];
	semesterElement.innerHTML = form['semester'];
	instructorElement.innerHTML = "Instructor: " + form['instructor'];
	dateElement.innerHTML = "Date: ";
	dateInput.setAttribute("type", "date");
	dateInput.setAttribute("value", todaysDate);
	outcomeElement.innerHTML = "Outcome: " + form['description'];

	dateElement.appendChild(dateInput);

	header.appendChild(courseElement);
	header.appendChild(semesterElement);
	header.appendChild(instructorElement);
	header.appendChild(dateElement);
	header.appendChild(outcomeElement);

	return header;
}

var getCACTableDiv = function(form) {	
	var tableDiv = document.createElement("div");
	var major = document.createElement("h4");
	var table = getTable(form['rubrics']);
	var studentList = getStudentListElement(form['studentsCAC']);

	major.innerHTML = "CSE";

	tableDiv.appendChild(major);
	tableDiv.appendChild(table);
	tableDiv.appendChild(studentList);

	return tableDiv;	
}

var getEACTableDiv = function(form) {	
	var tableDiv = document.createElement("div");
	var major = document.createElement("h4");
	var table = getTable(form['rubrics']);
	var studentList = getStudentListElement(form['studentsEAC']);

	major.innerHTML = "CpE";

	tableDiv.appendChild(major);
	tableDiv.appendChild(table);
	tableDiv.appendChild(studentList);

	return tableDiv;	
}

var getTable = function(rubrics) {
	var table = document.createElement("table");

	table.appendChild(getTableHeader());

	for(var i = 0; i < rubrics.length; i++) {
		var row = document.createElement("tr");
		var cell = document.createElement("td");
		cell.innerHTML = rubrics[i];
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
		var listElement = document.createElement("p");
		listElement.innerHTML =" Students: ";
		for(var i = 0; i < studentList.length; i++) {
			listElement.innerHTML += studentList[i] + ", ";
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