<?php

/**
 * @file
 *  Include or extend.
 */

/**
 * Get bot configuration from local json database.
 */
class Controller_Config extends Database_Local_Json
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
	 * Get configuration.
	 * Override this method to fetch configuration from a different source.
	 * Example:
	 * Suppose you need to fetch bot configuration from some place different
	 * than default JSON file. You can do it by overriding this method. However,
	 * you must retain default return array:
	 * array(
	 *   'channel' => 'channel name',
	 *   'port' => '6667',
	 *   ...
	 * )
	 * must retain current config model
	 * @return
	 *  (object) Bot configuration from json file.
	 */
	public function config() {
		try
		{
			$return = $this->getConfig();
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $return;
	}
}