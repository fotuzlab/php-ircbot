<?php

/**
 * @file
 *  Do not modify.
 *  This class makes connection to the local JSON database and returns
 *  either database object or configuration object for a bot.
 */

/**
 * Connect and retrieve data from local JSON database.
 */
class Database_Local_Json
{

	/**
	 * Constructor.
	 * @param
	 *  $botname: Name of the bot.
	 */
	protected function __construct($botname) {
		if (!$botname) {
			throw new Exception("Name of the bot is required as a parameter", 1);
		}
		$this->botname = $botname;
	}

	/**
	 * Load bot configuration.
	 * @return
	 *  (array) Bot configuration from JSON file.
	 */
	protected function getConfig() {
		// Get the file path.
		$filepath = INDEX_ROOT . '/bots/' . $this->botname . '/config.json';
		if (!file_exists($filepath)) {
			throw new Exception("config.json not found for " . $this->botname, 1);
		}
		return json_decode(file_get_contents($filepath));
	}

	/**
	 * Get bot data.
	 * @return
	 *  (array) Complete bot Database from JSON file.
	 */
	protected function getData() {
		// Get the file path.
		$filepath = INDEX_ROOT . '/bots/' . $this->botname . '/database.json';
		if (!file_exists($filepath)) {
			throw new Exception("config.json not found for " . $this->botname, 1);
		}
		return json_decode(file_get_contents($filepath));
	}

}