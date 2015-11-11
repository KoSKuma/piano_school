*** Settings ***
Documentation

Library           Selenium2Library
Resource          keyword.robot

*** Variable ***
${LOGIN URL}		http://128.199.71.232

***test case****
Valid Login
	Open Browser to Login page		${LOGIN URL}	
	Input email 					
	Input password 					
	Submit Login
	Welcome Page in home page


