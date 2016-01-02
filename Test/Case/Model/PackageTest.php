<?php
App::uses('Package', 'Model');

/**
 * Package Test Case
 *
 */
class PackageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.package',
		'app.firearm',
		'app.order',
		'app.customer',
		'app.customers_order',
		'app.firearms_order',
		'app.orders_package',
		'app.firearms_package'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Package = ClassRegistry::init('Package');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Package);

		parent::tearDown();
	}

}
