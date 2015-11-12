*** Settings ***
Documentation
Library           Selenium2Library
Resource          keyword.robot

*** Keywords ***


Open Browser to Login page
	[Arguments]		${LOGIN URL}	
	Open Browser	${LOGIN URL}

Input Email
	Input Text		email		admin1@gmail.com

Input Password
	Input Text		password	admin1

Submit Login
	Click Button	Sign In

Welcome Page in home page
	Page Should contain		HomepageAdmin

Go to Manage User page
	Click Element		user_menu

Go to TeacherList
	Click Element		teacher_menu

Click Button Add Teacher
 	Click Element		btn_add_teacher

Click View Profile Teacher
	Click Element		btn_teacher_profile

Click Edit Teacher
	Click Element		btn_edit_teacher

Click delete Teacher
	Click Element		btn_delete_teacher	

Click confirm delete
	Click Button		comfirm_delete_techer	

Back Teacherlist page
	Go To 				http://128.199.71.232/teacher
	

Go to StudentList
	Click Element		student_menu

Click Add Student
	Click Element 		add_student
	

Back Studentlist page 
	Go To 				http://localhost:8000/student

Click Edit Student
	Click Element		edit_student	

Click Delete Student
	Click Element		delete_student			