<?php

class Controller_Config extends Controller_Interface_Datasource
{
	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct('config');
	}

	public function get($botname) {
		return $this->getJson($botname);
	}
}