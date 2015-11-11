*** Settings ***
Documentation

Library           Selenium2Library
Resource          keyword.robot

*** Variable ***
${LOGIN URL}		http://128.199.71.232

***test case****
Valid Login
	Open Browser to Login page		${LOGIN URL}
	Maximize Browser Window
	Input email
	Input password
	Submit Login
	Welcome Page in home Page
Delete Tacher
	Go to Manage User page
	Go to TeacherList
	Click delete Teacher
	Sleep	3s
	Click confirm delete
