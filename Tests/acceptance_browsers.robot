*** Settings ***
Documentation     A test suite which contains acceptance tests for different browsers

Resource          resources.robot
Test Teardown     Close Browser

*** Keywords ***

Work of Firefox
	Open Browser main page
	Test Browser

Work of Chrome
	Open Browser2 main page
	Test Browser
	
Work of Edge
	Open Browser3 main page
	Test Browser
	
Work of Safari
	Open Browser4 main page
	Test Browser	
	
	
*** Test Cases ***

Work of Firefox should succeed
	Work of Firefox

Work of Chrome should succeed
	Work of Chrome
	
Work of Edge should succeed
	Work of Edge
	
Work of Safari should succeed
	Work of Safari