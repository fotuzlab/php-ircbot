<?php

include_once(__DIR__.'/core/local_json_database.worker.php');

class Config extends Local_Json_Database
{
	/**
	 * Constructor
	 */
	public function __construct($filename) {
		// $this->filename = $filename;
		parent::__construct($filename);
	}

	public function data() {
		return $this->getData();;
	}
}