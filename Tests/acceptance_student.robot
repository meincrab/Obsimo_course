*** Settings ***
Documentation     A test suite which contains acceptance tests for student

Resource          resources.robot
Test Setup		  Open browser main page
Test Teardown     Close Browser

*** Keywords ***

Student chooses courses
	Click Link	login/loginOpiskelija.php
	Wait Until Page Contains	Kirjautuminen opiskelijoille
	Input Username    K111
    Input Password    sala123
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPISKELIJAN SIVUT
	Click Link	valinta/kurssit.php
	Wait Until Page Contains	Welcome: user
	Wait Until Page Contains Element	//button[@data-id='1']
	Click Element	//button[@data-id='1']
	Click Element	//button[@data-id='2']
	Click Link	Lisää kurssit
	Wait Until Page Contains	OBSIMO OPISKELIJAN SIVUT
	Click Button	logout
	Wait Until Page Contains	Tervetuloa OBSIMO palveluun!
	
*** Test Cases ***
Student choosing courses should succeed
	Student chooses courses
	