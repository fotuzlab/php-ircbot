<?php

include_once(INDEX_ROOT.'/vendor/autoload.php');

class Net_SmartIRC_module_example extends Net_SmartIRC_module_Base
{
    public $name = '';
    public $author = '';
    public $description = '';
    public $license = 'MIT';

    private $irc;
    protected $botname;

    public function __construct($irc, $botname = NULL)
    {
        $this->botname = basename(__FILE__, '.module.php');
        parent::__construct($irc);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}