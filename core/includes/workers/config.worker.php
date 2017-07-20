<?php

include_once(INDEX_ROOT.'/vendor/autoload.php');

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