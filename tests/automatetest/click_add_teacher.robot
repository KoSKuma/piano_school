*** Settings ***
Documentation

Library           Selenium2Library
Resource          keyword.robot

*** Variable ***
${LOGIN URL}		http://localhost:8000/

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



