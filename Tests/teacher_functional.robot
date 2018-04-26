*** Settings ***
Documentation     A test suite which contains functional tests for teacher
Resource          resources.robot
Test Setup		  Open browser main page
Test Teardown     Close Browser

*** Keywords ***

Teacher looks student's plan
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    OP1
    Input Password    opesala1
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Link	opintosuunnitelmat.php
	Wait Until Page Contains	Ryhmät
	Click Link	TTV16S3
	Wait Until Page Contains	K111
	Click Link K111
	Wait Until Page Contains	Valitut kurssit
	
Teacher can see firm's feedback
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    OP1
    Input Password    opesala1
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Link	palautukset.php
	Wait Until Page Contains	Yritykset
	Click Link	test
	Wait Until Page Contains	Palaute
	
*** Test Cases ***
Teacher looking student's plan should succeed
	Teacher looks student's plan
	
Teacher can see firm's feedback should succeed
	Teacher can see firm's feedback
	
