<?php

include_once(__DIR__.'/../../core/includes/modules/base.module.php');

class Net_SmartIRC_module_shabri extends Net_SmartIRC_module_Base
{

    private $irc;
    protected $botname;

    public function __construct($irc, $botname)
    {
        $botname = basename(__FILE__, '.module.php');
        parent::__construct($irc, $botname);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}