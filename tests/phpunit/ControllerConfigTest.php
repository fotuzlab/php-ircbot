<?php

/**
 * @file
 *  PHPUnit test.
 */

use PHPUnit\Framework\TestCase;

/**
 * Tests for class Controller_Config.
 */
class ControllerConfigTest extends TestCase {

	private $checkAgainst;
	private $checkValue;
	private $config;

	/**
	 * Create class object.
	 */
	protected function setUp() {
        // Instantiate.
		$this->config = new Controller_Config(BOT);
    }

    public function testconfig() {
    	// Call method.
		$this->checkValue = $this->config->config();
		// Get file contents directly.
		// This line must change to fetch data from new source if config() 
		// method is overidden.
		$this->checkAgainst = json_decode(file_get_contents(INDEX_ROOT . '/bots/' . BOT . '/config.json'));

		// Assertion.
		$this->assertEquals($this->checkValue, $this->checkAgainst);
	}
}
