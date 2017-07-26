<?php

/**
 * @file
 *  PHPUnit test.
 */

use PHPUnit\Framework\TestCase;

/**
 * Tests for class Controller_Database.
 */
class ControllerDefaultDatabaseTest extends TestCase {

	private $checkAgainst;
	private $checkValue;
	private $database;

	/**
	 * Create class object.
	 */
	protected function setUp() {
        // Instantiate.
		$this->database = new Controller_Default_Database(BOT);
    }

    public function testdata() {
    	// Call method.
		$this->checkValue = $this->database->data();
		// Get file contents directly.
		// This line must change to fetch data from new source if data() 
		// method is overidden.
		$this->checkAgainst = json_decode(file_get_contents(INDEX_ROOT . '/bots/' . BOT . '/database.json'));

		// Assertion.
		$this->assertEquals($this->checkValue, $this->checkAgainst);
	}
}