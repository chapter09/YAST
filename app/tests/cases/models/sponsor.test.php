<?php
/* Sponsor Test cases generated on: 2012-08-18 19:04:17 : 1345287857*/
App::import('Model', 'Sponsor');

class SponsorTestCase extends CakeTestCase {
	var $fixtures = array('app.sponsor');

	function startTest() {
		$this->Sponsor =& ClassRegistry::init('Sponsor');
	}

	function endTest() {
		unset($this->Sponsor);
		ClassRegistry::flush();
	}

}
