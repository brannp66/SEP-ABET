function generateForm(form) {
	var formDiv = document.getElementById("form");
	var headerDiv = getHeaderDiv(form);
	formDiv.appendChild(headerDiv);
	var formTag = document.createElement("form");
	formTag.setAttribute("action", "saveForm.php");
	formTag.setAttribute("method", "POST");

	if(form['studentsCAC']) {
		var tableDiv = getCACTableDiv(form);
		formTag.appendChild(tableDiv);
	}
	if(form['studentsEAC']) {
		var tableDiv = getEACTableDiv(form);
		formTag.appendChild(tableDiv);
	}

	var basisDiv = getBasisDiv();
	formTag.appendChild(basisDiv);

	var submitButton = document.createElement("INPUT");
	submitButton.setAttribute("type", "submit");
	submitButton.setAttribute("value", "Submit");
	submitButton.setAttribute("class", "button tiny")
	formTag.appendChild(submitButton);

	formDiv.appendChild(formTag);
}

var getHeaderDiv = function(form) {
	var header = document.createElement("div");

	var courseElement = document.createElement("h3");
	var semesterElement = document.createElement("h3");
	var instructorElement = document.createElement("h5");
	var outcomeElement = document.createElement("h5");

	courseElement.innerHTML = form['courseId'].toUpperCase();
	courseElement.setAttribute("id","course");
	
	semesterElement.innerHTML = form['semester'];
	semesterElement.setAttribute("id","semester");

	instructorElement.innerHTML = "Instructor: " + form['instructor'];
	instructorElement.setAttribute("id","instructor");
	instructorElement.setAttribute("style","text-transform:capitalize");
	
	outcomeElement.innerHTML = "Outcome:  <strong>" + form['description'] + 
														 "</strong>";
	outcomeElement.setAttribute("id", "outcome");


	header.appendChild(courseElement);
	header.appendChild(semesterElement);
	header.appendChild(instructorElement);
	header.appendChild(outcomeElement);

	return header;
}

var getCACTableDiv = function(form) {	
	var tableDiv = document.createElement("div");
	var major = document.createElement("h4");
	var table = getTable(form['rubrics'],"CAC");
	var studentList = getStudentListElement(form['studentsCAC']);

	major.innerHTML = "Computer Science Undergrads";

	tableDiv.appendChild(major);
	tableDiv.appendChild(table);
	tableDiv.appendChild(studentList);

	return tableDiv;	
}

var getEACTableDiv = function(form) {	
	var tableDiv = document.createElement("div");
	var major = document.createElement("h4");
	var table = getTable(form['rubrics'], "EAC");
	var studentList = getStudentListElement(form['studentsEAC']);

	major.innerHTML = "Computer Engineering Undergrads";

	tableDiv.appendChild(major);
	tableDiv.appendChild(table);
	tableDiv.appendChild(studentList);

	return tableDiv;	
}

var getTable = function(rubrics, type) {
	var table = document.createElement("table");

	table.appendChild(getTableHeader());

	for(var i = 0; i < rubrics.length; i++) {
		var row = document.createElement("tr");
		var cell = document.createElement("td");
		cell.innerHTML = rubrics[i];
		row.appendChild(cell);
		for(var j = 0; j < 4; j++) {
			cell = document.createElement("td");
			cell.innerHTML = "<input type=\"number\" min=\"0\" max=\"100\" value=\"0\" name=\"" 
											 + type + "-" + i + "-" + j + "\">";
			row.appendChild(cell);
		}
		table.appendChild(row);
	}
	return table;
}

var getTableHeader = function() {
	var row = document.createElement("tr");

	var data = document.createElement("th");
	row.appendChild(data);

	var data = document.createElement("th");
	data.appendChild(document.createTextNode('1 (weak)'));
	row.appendChild(data);

	var data = document.createElement("th");
	data.appendChild(document.createTextNode('2 (poor)'));
	row.appendChild(data);

	var data = document.createElement("th");
	data.appendChild(document.createTextNode('3 (good)'));
	row.appendChild(data);

	var data = document.createElement("th");
	data.appendChild(document.createTextNode('4 (excellent)'));
	row.appendChild(data);

	return row;
}

var getStudentListElement = function(studentList) {
		var listElement = document.createElement("h5");
		listElement.innerHTML =" Students: ";
		for(var i = 0; i < studentList.length; i++) {
			listElement.innerHTML += studentList[i] + ", ";
		}

		//slice off trailing comma
		listElement.innerHTML = listElement.innerHTML.slice(0,-2);

		return listElement;
}
var getBasisDiv = function () {
	var basis = document.createElement("div");
	var label = document.createElement("h4");
	var input = document.createElement("textarea");
	input.setAttribute("name", "basedOn");
	input.setAttribute("id", "basis");
	var note = document.createElement("h5");

	label.innerHTML = "The above evaluation is based on:";
	note.innerHTML = "This can be a project, an assignment or homework." + 
									 "Please list above - or provide reference to the basis of" + 
									 "evaluation (e.g. Assignment 2, Exam - question 5, etc.)";

	basis.appendChild(label);
	basis.appendChild(input);
	basis.appendChild(note);

	return basis;
}