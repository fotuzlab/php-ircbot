<?php

/**
 * @file
 *  Bot module.
 *  Extend of modify this class to add more functionality to your bot.
 */

/**
 * Create a bot module to be used by Net_SmartIRC library.
 */
class Net_SmartIRC_module_shabri extends Net_SmartIRC_module_Base
{
    public $name = '';
    public $author = '';
    public $description = '';
    public $license = 'MIT';

    private $irc;

    /**
     * Constructor.
     * @param
     *  $irc: (object).
     */
    public function __construct($irc)
    {
        $this->botname = basename(__FILE__, '.module.php');
        parent::__construct($irc);
    }

    /**
     * Call parent destructor.
     */
    public function __destruct()
    {
        parent::__destruct();
    }

}