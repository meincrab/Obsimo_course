*** Settings ***
Documentation     A test suite which contains functional tests for firm

Resource          resources.robot
Test Setup		  Open browser main page
Test Teardown     Close Browser

*** Keywords ***

Firm chooses courses
	Click Link	login/loginYritys.php
	Wait Until Page Contains	Kirjautuminen Yrityksille
    Submit Credentials
	Wait Until Page Contains	OBSIMO YRITYKSEN SIVUT
	Click Link	valinta/kurssit.php
	Wait Until Page Contains	Welcome!
	Wait Until Page Contains Element	//button[@data-id='1']
	Click Element	//button[@data-id='1']
	Click Element	//button[@data-id='2']
	Click Link	Lisää kurssit
	Wait Until Page Contains	OBSIMO YRITYKSEN SIVUT
	
Firm writes feedback
	Click Link	login/loginYritys.php
	Wait Until Page Contains	Kirjautuminen Yrityksille
    Submit Credentials
	Wait Until Page Contains	OBSIMO YRITYKSEN SIVUT
	Click Link	valinta/kurssit.php
	Wait Until Page Contains	Welcome!
	Wait Until Page Contains Element	//button[@data-id='1']
	Click Element	//button[@data-id='1']
	Click Element	//button[@data-id='2']
	Input Text	palaute	good
	Click Link	Lisää kurssit
	Wait Until Page Contains	OBSIMO YRITYKSEN SIVUT
	
*** Test Cases ***
Firm chooses courses should succeed
	Firm chooses courses
Firm writes feedback should succeed
	Firm writes feedback