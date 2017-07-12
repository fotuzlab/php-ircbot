<?php

include_once(__DIR__.'/core/base.module.php');

class Net_SmartIRC_module_Shabri extends Net_SmartIRC_module_Base
{

    private $irc;
    protected $botname;

    public function __construct($irc, $botname)
    {
        $botname = 'shabri';
        parent::__construct($irc, $botname);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}