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