*** Settings ***
Documentation

Library           Selenium2Library
Resource          keyword.robot

*** Variable ***
${LOGIN URL}		http://128.199.71.232

***test case****
Login
	Open Browser to Login page		${LOGIN URL}
	Maximize Browser Window
	Input email
	Input password
	Submit Login
	Welcome Page in home page

Add Teacher Success
	Go to Manage User page
	Go to TeacherList
	Click Button Add Teacher
	Back Teacherlist page
	
View Profile
	Click View Profile Teacher
	Title Should Be 				 Piano School - Teacher Profile
	Back Teacherlist page

Edit Teacher
	Click Edit Teacher
	Title Should Be 				 Piano School - Update Tacher
	Back Teacherlist page
	
Delete Tacher
	Click delete Teacher
	Sleep	3s
	Click confirm delete
	Close Browser



