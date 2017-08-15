<?php

class Controller_Database extends Controller_Interface_Datasource
{
	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct('database');
	}

	public function get($botname) {
		return $this->getJson($botname);
	}
}