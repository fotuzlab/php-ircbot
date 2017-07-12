<?php

class Local_Json_Database
{

	/**
	 * Constructor
	 */
	protected function __construct($filename) {
		$this->filename = $filename;
	}

	protected function getConfig() {
		// Get the file path.
		$filepath = __DIR__ . '/../../../app/config/' . $this->filename . '.config.json';
		return json_decode(file_get_contents($filepath));
	}

	protected function getData() {
		// Get the file path.
		$filepath = __DIR__ . '/../../../app/database/' . $this->filename . '.database.json';
		return json_decode(file_get_contents($filepath));
	}

}