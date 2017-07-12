<?php

class Local_Json_Database
{

	/**
	 * Constructor
	 */
	protected function __construct($botname) {
		$this->botname = $botname;
	}

	protected function getConfig() {
		// Get the file path.
		$filepath = __DIR__ . '/../../../app/' . $this->botname . '/' . $this->botname . '.config.json';
		return json_decode(file_get_contents($filepath));
	}

	protected function getData() {
		// Get the file path.
		$filepath = __DIR__ . '/../../../app/' . $this->botname . '/' . $this->botname . '.database.json';
		return json_decode(file_get_contents($filepath));
	}

}