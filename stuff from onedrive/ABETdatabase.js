db.ClassRoster.insert(
	[
		{	"semester":"Fall2014",
			"course":"cse3342",
			"instructor": "coyle",
			"studentsCAC":["roolo berger", "marcy klaust"],
			"studentsEAC":["wilfred barry", "maximillian schell"]
		},
		{	"semester":"Fall2014",
			"course":"cse5343",
			"instructor":"coyle",
			"studentsCAC":["mixdorf berger", "barney rubble"],
			"studentsEAC":["wilfred barry", "roger schonbergell"]
		}
	]
)

db.CourseOutcomes.insert(
	[	
		{ "courseId":"cse1341",
			"courseName":"Principles of Computer Science I",
			"CACOutcomes":["B"],
			"EACOutcomes":["E", "K"]
		},
		{ "courseId":"cse1342",
			"courseName":"Programming Concepts",
			"CACOutcomes":["A", "B", "G", "I", "K"],
			"EACOutcomes":["E", "G", "H", "K"]
		},
		{ "courseId":"cse2240",
			"courseName":"Assembly Language and Machine Instruction",
			"CACOutcomes":["A", "B", "C", "I"],
			"EACOutcomes":["A", "C", "E", "K"]
		},
		{ "courseId":"cse2341",
			"courseName":"Data Structures",
			"CACOutcomes":["A", "B", "F"],
			"EACOutcomes":["B", "F"]
		},
		{ "courseId":"cse3330",
			"courseName":"Database Concepts",
			"CACOutcomes":["C", "G"],
			"EACOutcomes":["NULL"]
		},
		{ "courseId":"cse3342",
			"courseName":"Programming Languages",
			"CACOutcomes":["C", "F"],
			"EACOutcomes":["NULL"]
		},
		{ "courseId":"cse3345",
			"courseName":"Graphical User Interface Design",
			"CACOutcomes":["F", "I"],
			"EACOutcomes":["NULL"]
		},
		{ "courseId":"cse3353",
			"courseName":"Fundamentals of Algorithms",
			"CACOutcomes":["A", "C", "J"],
			"EACOutcomes":["A"]
		},
		{ "courseId":"cse3381",
			"courseName":"Digital Logic Design",
			"CACOutcomes":["C"],
			"EACOutcomes":["A", "C", "G", "K"]
		},
		{ "courseId":"cse4344",
			"courseName":"Computer Networks & Distributed Systems",
			"CACOutcomes":["C", "F"],
			"EACOutcomes":["C", "E"]
		},
		{ "courseId":"cse4345",
			"courseName":"Software Engineering Principles",
			"CACOutcomes":["C", "D", "F"],
			"EACOutcomes":["NULL"]
		},
		{ "courseId":"cse4351",
			"courseName":"Senior Design I",
			"CACOutcomes":["A", "C", "D", "E", "F", "I", "K"],
			"EACOutcomes":["D", "F"]
		},
		{ "courseId":"cse4352",
			"courseName":"Senior Design II",
			"CACOutcomes":["A", "C", "D", "E", "F", "G", "H", "I", "K"],
			"EACOutcomes":["E", "H"]
		},
		{ "courseId":"cse4381",
			"courseName":"Digital Computer Design",
			"CACOutcomes":["B", "C", "G", "J"],
			"EACOutcomes":["A", "C", "E", "K"]
		},
		{ "courseId":"cse5343",
			"courseName":"Operating Systems & System Software",
			"CACOutcomes":["C", "F", "G", "H"],
			"EACOutcomes":["B", "C", "G", "H", "I", "J"]
		},
		{ "courseId":"cse5387",
			"courseName":"Digital Systems Design",
			"CACOutcomes":["NULL"],
			"EACOutcomes":["C", "K"]
		}
	]
)

db.CycleOfOutcomes.insert(
	[
		{	"semester":"Fall2014",
			"CACOutcomes": ["A", "H", "D"],
			"EACOutcomes": ["A", "D", "I"]
		},
		{	"semester":"Spring2015",
			"CACOutcomes": ["A", "H", "D"],
			"EACOutcomes": ["A", "D", "I"]
		},
		{	"semester":"Fall2015",
			"CACOutcomes": ["B", "G", "J", "K"],
			"EACOutcomes": ["H", "E", "B", "G"]
		},
		{	"semester":"Spring2016",
			"CACOutcomes": ["B", "G", "J", "K"],
			"EACOutcomes": ["H", "E", "B", "G"]
		},
		{	"semester":"Fall2016",
			"CACOutcomes": ["C", "E", "F"],
			"EACOutcomes": ["C", "F", "G"]
		},
		{	"semester":"Spring2017",
			"CACOutcomes": ["C", "E", "F"],
			"EACOutcomes": ["C", "F", "G"]
		}
	]
)

db.EACandCACMatchups.insert(
	[	
		{ "EAC":"C",
			"CAC":"C",
			"rubrics":["Develop design requirements", 
								"Produce a design", 
								"Implement & Evaluate"
							]
		},
		{ "EAC":"F",
			"CAC":"E",
			"rubrics":["Knowledge of the code of ethics", 
								"Recognize the ethical dimensions of a problem"
							]
		},
		{ "EAC":"G",
			"CAC":"F",
			"rubrics":["Abilitya to write effective content", 
							 "Ability to present technical material"
							]
		},
		{ "EAC":"K",
			"CAC":"I",
			"rubrics":["Identify techniques", 
							 "Skill with tools", 
							 "Identify tools appropriate to the problem"
							]
		},
		{ "EAC":"A",
			"CAC":"A",
			"rubrics":["Able to apply math concepts to problems", 
							 "Able to apply scientific results to problems"
							]
		},
		{ "EAC":"D",
			"CAC":"D",
			"rubrics":["Contribute to the team effort",
							 "Prepared at team meetings"
							]
		},
		{ "EAC":"I",
			"CAC":"H",
			"rubrics":["Engage in professional activities",
							 "Transfer concepts to real world situations",
							 "Ability to reference sources"
							]
		},
		{ "EAC":"E",
			"CAC":"B",
			"rubrics":["Analyze a problem and identify computing requirements"]
		},
		{ "EAC":"H",
			"CAC":"G",
			"rubrics":["Analyze the local impact of computing",
							 "Analyze the global impact of computing"
							]
		},
		{ "EAC":"B",
			"rubrics":["Design experiments",
							 "Conduct experiments",
							 "Analyze data",
							 "Interpret data"
							]
		},
		{ "EAC":"J",
			"rubrics":["Current technological events in the discipline",
							 "Awareness of emerging technologies in the discipline"
					    ]
		},
		{ "CAC":"J",
			"rubrics":["Apply math foundations to computer based systems",
							 "Apply algorithmic foundations to computer based systems"
							]
		},
		{ "CAC":"K",
			"rubrics":["Apply design and development principles to software construction"]
		}
	]
)

db.Outcomes.insert(
	[  
	  {
	    "type": "CAC",
	    "letter": "A",
	    "description": "An ability to apply knowledge of computing and mathematics appropriate to the discipline"
	  },
	  {
	    "type": "CAC",
	    "letter": "B",
	    "description": "An ability to analyze a problem, and identity and define the computing requirements appropriate to its solution"
	  },
	  {
	    "type": "CAC",
	    "letter": "C",
	    "description": "An ability to design, implement, and evaluate a computer-based system, process, component, or program to meet desired needs"
	  },
	  {
	    "type": "CAC",
	    "letter": "D",
	    "description": "An ability to function effectively on teams to accomplish a common goal"
	  },
	  {
	    "type": "CAC",
	    "letter": "E",
	    "description": "An understanding of professional, ethical, legal, security and social issues and responsibilities"
	  },
	  {
	    "type": "CAC",
	    "letter": "F",
	    "description": "An ability to communicate effectively with a range of audiences"
	  },
	  {
	    "type": "CAC",
	    "letter": "G",
	    "description": "An ability to analyze the local and global impact of computing on individuals, organizations, and society"
	  },
	  {
	    "type": "CAC",
	    "letter": "H",
	    "description": "Recognition of the need for and an ability to engage in continuing professional development"
	  },
	  {
	    "type": "CAC",
	    "letter": "I",
	    "description": "An abiility to use current tecniques, skills, and tools necessary for computing practice."
	  },
	  {
	    "type": "CAC",
	    "letter": "J",
	    "description": "An ability to apply mathematical foundations, algorithmic principles, and computer science theory in the modeling and design of computer-based systems in a way that demonstrates comprehension of the tradeoffs involved in design choices"
	  },
	  {
	    "type": "CAC",
	    "letter": "K",
	    "description": "Able to apply design and development pronciples in the construction of software of varying complexity"
	  },
	  {
	    "type": "EAC",
	    "letter": "A",
	    "description": "An ability to apply knowledge of mathematics, science, and engineering."
	  },
	  {
	    "type": "EAC",
	    "letter": "B",
	    "description": "An ability to design and conduct experiments, as well as to analyze and interpret data."
	  },
	  {
	    "type": "EAC",
	    "letter": "C",
	    "description": "An ability to design a system, component or process to meet desired needs within realistic constrains such as economic, environmental, social, political, ethical, health and safety, manufacturing and sustainability."
	  },
	  {
	    "type": "EAC",
	    "letter": "D",
	    "description": "An ability to function multidisciplinary teams."
	  },
	  {
	    "type": "EAC",
	    "letter": "E",
	    "description": "An ability to identift, formulate, and solve engineering problems."
	  },
	  {
	    "type": "EAC",
	    "letter": "F",
	    "description": "Understanding of professional and ethical responsibility."
	  },
	  {
	    "type": "EAC",
	    "letter": "G",
	    "description": "Ability to communicate effectively."
	  },
	  {
	    "type": "EAC",
	    "letter": "H",
	    "description": "The broad education necessary to understand the impact of engineering solutions in a global, economic, environmental and societal context."
	  },
	  {
	    "type": "EAC",
	    "letter": "I",
	    "description": "Recofnition of the need for, and an ability to engage in life-long learning."
	  },
	  {
	    "type": "EAC",
	    "letter": "J",
	    "description": "A knowledge of contemporary issues."
	  },
	  {
	    "type": "EAC",
	    "letter": "K",
	    "description": "An ability to use the techniques, skills, and modern engineering tools necessary for engineering practice."
	  }
	]
)

db.Users.insert(
	[
		{
			"name":"coyle",
			"password":"password",
			"type":"instructor"
		},
		{
			"name":"admin",
			"password":"password",
			"type":"admin"
		}
	]
)