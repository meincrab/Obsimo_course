*** Settings ***
Documentation     A test suite contains login tests for student and teacher
...				  Tests with correct credentials for student and teacher
...				  Tests with wrong credentials for student and teacher
...				  Tests with sql injection for student and teacher

Resource          resources.robot
Test Setup		  Open browser main page
Test Teardown     Close Browser


*** Keywords ***

Login as a student with correct credentials
	Click Link	login/loginOpiskelija.php
	Wait Until Page Contains	Kirjautuminen opiskelijoille
	Input Username    K111
    Input Password    sala123
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPISKELIJAN SIVUT
	
Login as a teacher with correct credentials
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    OP1
    Input Password    opesala1
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	
Login as a student with wrong credentials
	Click Link	login/loginOpiskelija.php
	Wait Until Page Contains	Kirjautuminen opiskelijoille
	Input Username    boo
    Input Password    boo
    Submit Credentials
	Wait Until Page Contains	Your Login Name or Password is invalid
	
Login as a teacher with wrong credentials
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    ops
    Input Password    ops
    Submit Credentials
	Wait Until Page Contains	Your Login Name or Password is invalid
	
Login as a student with sql injection
	Click Link	login/loginOpiskelija.php
	Wait Until Page Contains	Kirjautuminen opiskelijoille
	Input Username    boo' or ''='
    Input Password    boo' or ''='
    Submit Credentials
	Wait Until Page Contains	Your Login Name or Password is invalid
	
Login as a teacher with sql injection
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    ops' or ''='
    Input Password    ops' or ''='
    Submit Credentials
	Wait Until Page Contains	Your Login Name or Password is invalid
	
*** Test Cases ***
Login as a student with correct credentials should succeed
	Login as a student with correct credentials
Login as a teacher with correct credentials should succeed
	Login as a teacher with correct credentials
Login as a student with wrong credentials should fail
	Login as a student with wrong credentials
Login as a teacher with wrong credentials should fail
	Login as a teacher with wrong credentials
Login as a student with sql injection should fail
	Login as a student with sql injection
Login as a teacher with sql injection should fail
	Login as a teacher with sql injection