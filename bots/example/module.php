<?php

/**
 * @file
 *  Bot module.
 *  Extend of modify this class to add more functionality to your bot.
 */

/**
 * Create a bot module to be used by Net_SmartIRC library.
 * Change the name of the class after "Net_SmartIRC_module_" to match the 
 * botname.
 * e.g. If your botname is "robo", class name should be Net_SmartIRC_module_robo.
 * Note names are case-sensitive.
 */
class Net_SmartIRC_module_example extends Module_Net_SmartIRC
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
        $this->botname = basename(__DIR__);
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