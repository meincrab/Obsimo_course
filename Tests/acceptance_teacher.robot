*** Settings ***
Documentation     A test suite which contains acceptance tests for teacher

Resource          resources.robot
Test Setup		  Open browser main page
Test Teardown     Close Browser

*** Keywords ***

Teacher looks firm's suggestions
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    OP1
    Input Password    opesala1
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Link	palautukset.php
	Wait Until Page Contains	Yritykset
	Click Link	test
	Wait Until Page Contains	Kurssit
	Click Link	opettaja.php
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Button	logout
	Wait Until Page Contains	Tervetuloa OBSIMO palveluun!
	
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
	Click Link	K111
	Wait Until Page Contains	Valitut kurssit
	Click Link	opettaja.php
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Button	logout
	Wait Until Page Contains	Tervetuloa OBSIMO palveluun!

Teacher looks group members
	Click Link	login/loginOpettaja.php
	Wait Until Page Contains	Kirjautuminen opettajille
	Input Username    OP1
    Input Password    opesala1
    Submit Credentials
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Link	opintosuunnitelmat.php
	Wait Until Page Contains	Ryhmät
	Click Link	TTV16S3
	Wait Until Page Contains	Students
	Click Link	opettaja.php
	Wait Until Page Contains	OBSIMO OPETTAJAN SIVUT
	Click Button	logout
	Wait Until Page Contains	Tervetuloa OBSIMO palveluun!		
	

	
*** Test Cases ***
Teacher looking firm's suggestions should succeed
	Teacher looks firm's suggestions
	
Teacher looking student's plan should succeed
	Teacher looks student's plan
	
Teacher looking group members should succeed
	Teacher looks group members