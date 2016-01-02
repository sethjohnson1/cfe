<?php
App::uses('Webpage', 'Model');

/**
 * Webpage Test Case
 *
 */
class WebpageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.webpage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Webpage = ClassRegistry::init('Webpage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Webpage);

		parent::tearDown();
	}

}
