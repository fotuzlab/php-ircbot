<?php

include_once(__DIR__.'/../../components/workers/local_json_database.worker.php');

class Config extends Local_Json_Database
{
	/**
	 * Constructor
	 */
	public function __construct($filename) {
		parent::__construct($filename);
	}

	public function config() {
		return $this->getConfig();;
	}
}