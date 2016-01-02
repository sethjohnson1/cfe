<?php
App::uses('FirearmsOrder', 'Model');

/**
 * FirearmsOrder Test Case
 *
 */
class FirearmsOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.firearms_order',
		'app.firearm',
		'app.order',
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
		$this->FirearmsOrder = ClassRegistry::init('FirearmsOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FirearmsOrder);

		parent::tearDown();
	}

}
