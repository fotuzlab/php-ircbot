<?php

/**
 * @file
 *  Do not modify.
 *  This class makes a connection to IRC channel using NET_SmartIRC library.
 */

// This is hack due to conflict with psr-0 and namespaces of NET_SmartIRC library.
// This should go when project is moved to psr-4 autoloading.
chdir("vendor/pear/net_smartirc");
include_once('Net/SmartIRC.php');

/**
 * Load chat module and connect the bot to IRC channel.
 */
class Connect_Bot
{
	/**
	 * Constructor.
	 * @param
	 *  $botname: Name of the bot to load.
	 */
	public function __construct($botname) {
		if (!$botname) {
			throw new Exception("Name of the bot is required as a parameter", 1);
		}
		$irc = new Net_SmartIRC(array(
			// Print log.
		    'DebugLevel' => SMARTIRC_DEBUG_ALL,
		));
		// Load config.
		$config = (new Config($botname))->config();

		// Load module.
		$irc->loadModule($botname)
		    ->connect($config->server, $config->port)
		    ->login($config->nick, $config->name, 0)
		    ->join(array($config->channel))
		    ->listen()
		    ->disconnect();
	}

	/**
	 * Destructor.
	 */
	public function __destruct() {
		// 
	}
}