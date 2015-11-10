*** Settings ***
Documentation

Library           Selenium2Library
Resource          keyword.robot

*** Variable ***
${LOGIN URL}		http://localhost:8000/

***test case****
Valid Login
	Open Browser to Login page		${LOGIN URL}	
	Input email 					
	Input password 					
	Submit Login
	Welcome Page in home page


