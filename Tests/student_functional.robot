*** Settings ***
Documentation     A test suite which contains functional tests for student

Resource          resources.robot
Test Setup		  Open browser main page
Test Teardown     Close Browser

*** Keywords ***

Student can delete course
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
	Click Element	//*[@id="table"]/tr/td[1]/button
	
Student can see firm's wishes
	Click Link	login/loginOpiskelija.php
	Wait Until Page Contains	Kirjautuminen opiskelijoille
	Input Username    K111
    Input Password    sala123
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPISKELIJAN SIVUT
	Click Link	palautukset.php
	Wait Until Page Contains	Yritykset
	Click Link	test
	Wait Until Page Contains	Kurssit
	
Points are counted correct
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
	Wait Until Page Contains	Pisteet yhteensä: 3
	Click Element	//button[@data-id='2']
	Wait Until Page Contains	Pisteet yhteensä: 7
	
Student makes studing program
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
	
*** Test Cases ***
Student can delete course should succeed
	Student can delete course
Student can see firm's wishes should succeed
	Student can see firm's wishes
Points are counted correct should succeed
	Points are counted correct
Student makes studing program should succeed
	Student makes studing program
	