<?php

include_once(__DIR__.'/core/local_json_database.worker.php');

class Database extends Local_Json_Database
{
	/**
	 * Constructor
	 */
	public function __construct($filename) {
		// $this->filename = $filename;
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
				print_r($value);
				return $value->response;
			}
		}

	}
}