<?php
App::uses('FirearmsPackage', 'Model');

/**
 * FirearmsPackage Test Case
 *
 */
class FirearmsPackageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.firearms_package',
		'app.firearm',
		'app.order',
		'app.firearms_order',
		'app.package'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FirearmsPackage = ClassRegistry::init('FirearmsPackage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FirearmsPackage);

		parent::tearDown();
	}

}
