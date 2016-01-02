<?php
App::uses('OrdersPackage', 'Model');

/**
 * OrdersPackage Test Case
 *
 */
class OrdersPackageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orders_package',
		'app.order',
		'app.customer',
		'app.customers_order',
		'app.firearm',
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
		$this->OrdersPackage = ClassRegistry::init('OrdersPackage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrdersPackage);

		parent::tearDown();
	}

}
