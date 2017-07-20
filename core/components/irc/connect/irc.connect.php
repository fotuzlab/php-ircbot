<?php

include_once(INDEX_ROOT.'/vendor/autoload.php');

chdir("vendor/pear/net_smartirc");
include_once('Net/SmartIRC.php');

class Connect_Bot
{
	public function __construct($botname) {
		$irc = new Net_SmartIRC(array(
		    'DebugLevel' => SMARTIRC_DEBUG_ALL,
		));
		$config = (new Config($botname))->config();

		$irc->loadModule($botname)
		    ->connect($config->server, $config->port)
		    ->login($config->nick, $config->name, 0)
		    ->join(array($config->channel))
		    ->listen()
		    ->disconnect();
	}

	public function __destruct() {
		// 
	}
}