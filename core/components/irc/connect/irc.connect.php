<?php

include_once(__DIR__.'/../../../../app/' . BOT_NAME . '/' . BOT_NAME . '.module.php');
include_once(__DIR__.'/../../../includes/workers/config.worker.php');

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