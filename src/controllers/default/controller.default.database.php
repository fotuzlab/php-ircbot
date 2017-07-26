<?php

/**
 * @file
 *  Include or extend.
 */

/**
 * Get bot message/reposnse mapping from local json database.
 */
class Controller_Default_Database extends Datasource_Default_Json
{
	/**
	 * Constructor.
	 * @param
	 *  $bot: Name of the bot.
	 */
	public function __construct($bot) {
		try
		{
			parent::__construct($bot);
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	/**
	 * Get data from local json file.
	 * Override this method to fetch data from a different source.
	 * Example:
     * Suppose you have a different database of message/response mapping
     * and you don't wish to store it as JSON files as per default architecture.
     * All you need to do is extend your class with this class and override this
     * method to fetch data from own database.
     * The default return data format is:
     * array(
	 *	 array(
	 *	   "message" => "/^message/",
	 *	   "response" => "Response."
	 *	 ),
	 *   ...
	 * )
	 * You must retain the same format. In case you wish to modify it, you
	 * may need to override Net_SmartIRC_module_Base::createHandlerIds() as well.
	 * @see
	 *  Net_SmartIRC_module_Base::createHandlerIds()
	 * @return
	 *  (object) Data from local json file.
	 */
	public function data() {
		try
		{
			$this->data = $this->getData();
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $this->data;
	}

	/**
	 * Map message and response.
	 * @param
	 *  (array) Message.
	 * @return
	 *  (array) Response.
	 */
	public function getResponse($message) {
		$data = $this->data;

		foreach ($data as $key => $value) {
			if (preg_match($value->message, $message) == 1) {
				return $value->response;
			}
		}

	}
}