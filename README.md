# DegreePlanner
A Degree Planner for UTD. Default including CS master courses (both core and eligible). Use PHP and XAMPP for back-end, and JavaScript, JQuery for front-end.

First, create a folder (DegreePlanner in xampp htdoc for this project) to include all   programs and data files here for this assignment. The zip file of DegreePlanner folder should be submitted to elearning. 
	./DegreePlanner		for all degree planner code
	./DegreePlanner/sql		for all the sql files (experted from mySQL)
	./DegreePlanner/data		for any data or miscellaneous files.
	./DegreePlanner/selenium 	for selenium test cases

All of  codes should be saved in the folder (./DegreePlanner)

(1) Web server provides log-in and log-out for a user, along with database table for user information.

(2) Once log-in successfully, user will see the main web page of degree planner. Design and implement the main page for degree planner which has five main parts: 
(a) Heading with Personal/Profile Information, 
(b) Core Courses (required/fixed), 
(c) Core Courses with option to be selected, 
(d) Elective Courses (to be selected), and 
(e) Prerequisite Courses. The main page is essentially the web-version of the paper form of degree plan. You may have only one track for this project. 
Name the main php program: planner.php

(3) Provide some means of help or suggestion or field-check/validation for some fields, for example, to select a course (e.g., to select a course out of a list of courses or auto-complete), semester (for example, fall, spring, summer for semester and its year), and grade (for A, A-, …). If the first semester is fall 2018 (yyyy), then the choice of semester/year should be one from Fall 2018 to Summer 2020 (= yyyy + 2 years), assuming for 2-year program in full-time study.

(4) Provide a capability to save a degree plan in work, and to retrieve it later to be updated. Provide a field in the main web page for degree plan name (so that this degree plan can be saved and retrieved with this name). The default plan name will be a string of StudentID+today (for example, student1-2019-07-30).

(5) For each log-in and log-out activity of user, provide PHP session and cookie, and save each log-in/log-out session information in a database table (or in a file) for audit and log.

(6) For database (DegreePlanner), provide three tables: (a) userid table, (b) table for student degree plan (where each record is a degree plan of a student), (c) course table with all the courses (from Assignment2 or with the sample sql), and (d) session table for session information (login/logout/userid). 

(7) Provide selenium test cases (and copy all selenium test case or suite in ./DegreePlanner/selenium)

(8) Test Cases
(a)   degree plan with   track (e.g., Intelligent System) with student1 userid.
(b) Another degree plan with   track (e.g., Intelligent System) with student1 userid.
(c) A degree plan with   track (e.g., Intelligent System) with student2 userid.