<?php

define('BOT_NAME', basename(__FILE__, '.bot.php'));

include_once(__DIR__.'/../modules/' . BOT_NAME . '.module.php');
include_once(__DIR__.'/../../core/includes/workers/config.worker.php');

$irc = new Net_SmartIRC(array(
    'DebugLevel' => SMARTIRC_DEBUG_ALL,
));
$config = (new Config(BOT_NAME))->config();

$irc->loadModule(BOT_NAME)
    ->connect($config->server, $config->port)
    ->login($config->nick, $config->name, 0)
    ->join(array($config->channel))
    ->listen()
    ->disconnect();