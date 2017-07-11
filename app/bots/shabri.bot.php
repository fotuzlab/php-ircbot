<?php

include_once(__DIR__.'/../includes/modules/shabri.module.php');
include_once(__DIR__.'/../includes/workers/config.worker.php');

$irc = new Net_SmartIRC(array(
    'DebugLevel' => SMARTIRC_DEBUG_ALL,
));
$config = (new Config('shabri'))->config();

$irc->loadModule('Shabri')
    ->connect('ssl://chat.freenode.net', 6697)
    ->login($config->nick, $config->name, 0)
    ->join(array($config->channel))
    ->listen()
    ->disconnect();