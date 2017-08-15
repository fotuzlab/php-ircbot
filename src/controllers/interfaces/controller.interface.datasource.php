<?php

/**
 * Abstract class for defining a datasource for the bot.
 * Contains helper function for read json files.
 */
abstract class Controller_Interface_Datasource
{
	private $botname;

	/**
	 * Constructor.
	 * @param
	 *  $type: database or config.
	 */
	protected function __construct($type) {
		if (!$type) {
			$type = 'database';
		}
		$this->type = $type;
	}

	/**
	 * Enforce method get().
	 */
    abstract protected function get($botname);

    /**
     * Helper function to retrieve data from json files.
     */
    protected function getJson($botname) {
    	// Get the file path.
		$filepath = INDEX_ROOT . '/src/bots/' . $botname . '/' . $this->type . '.json';
		if (!file_exists($filepath)) {
			throw new Exception($this->type . ".json not found for " . $botname, 1);
		}
		return json_decode(file_get_contents($filepath));
    }
}