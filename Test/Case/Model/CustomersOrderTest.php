<?php
App::uses('CustomersOrder', 'Model');

/**
 * CustomersOrder Test Case
 *
 */
class CustomersOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.customers_order',
		'app.customer',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CustomersOrder = ClassRegistry::init('CustomersOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CustomersOrder);

		parent::tearDown();
	}

}
