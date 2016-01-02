<?php
App::uses('Firearm', 'Model');

/**
 * Firearm Test Case
 *
 */
class FirearmTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.firearm',
		'app.order',
		'app.firearms_order',
		'app.package',
		'app.firearms_package'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Firearm = ClassRegistry::init('Firearm');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Firearm);

		parent::tearDown();
	}

}
