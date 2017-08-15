<?php

/**
 * @file
 *  Do not modify.
 *  This class makes a connection to IRC channel using NET_SmartIRC library.
 */

// This is hack due to conflict with psr-0 and namespaces of NET_SmartIRC library.
// This should go when project is moved to psr-4 autoloading.
chdir(INDEX_ROOT . "/vendor/pear/net_smartirc");
include_once('Net/SmartIRC.php');

/**
 * Load chat module and connect the bot to IRC channel.
 */
class Library_Net_Smartirc_Connector implements Library_Interface_Connector
{

	private $botname;
	private $irc;

	/**
	 * Constructor.
	 * @param
	 *  $botname: Name of the bot to load.
	 */
	public function __construct($botname) {
		if (!$botname) {
			throw new Exception("Name of the bot is required as a parameter", 1);
		}

		$this->botname = $botname;

		$this->irc = new Net_SmartIRC(array(
			// Print log.
		    'DebugLevel' => SMARTIRC_DEBUG_ALL,
		));
	}

	/**
	 * Destructor.
	 */
	public function __destruct() {
		// 
	}

	/**
	 * Connect to irc channel.
	 */
	public function connect() {
		// Load config.
		$config = (new Controller_Config())->get($this->botname);
		$this->irc->connect($config->server, $config->port);
	    $this->irc->login($config->nick, $config->name, 0);
	    $this->irc->join(array($config->channel));
	    $this->irc->listen();
	    $this->irc->disconnect();
	}

	/**
	 * Connect to chatbot module.
	 * Each method should load a distict module.
	 */
	public function chatbot() {
		// Load chatbot module.
		$bot = new Library_Net_Smartirc_Module_Chatbot($this->irc, $this->botname);
	    $this->connect();
	}
}
