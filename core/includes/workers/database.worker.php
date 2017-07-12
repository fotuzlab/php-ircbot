<?php

include_once(__DIR__.'/../../components/workers/local_json_database.worker.php');

class Database extends Local_Json_Database
{
	/**
	 * Constructor
	 */
	public function __construct($filename) {
		parent::__construct($filename);
	}

	public function data() {
		$this->data = $this->getData(); 
		return $this->data;
	}

	public function getResponse($message) {
		$data = $this->data;

		foreach ($data as $key => $value) {
			if (preg_match($value->message, $message) == 1) {
				return $value->response;
			}
		}

	}
}