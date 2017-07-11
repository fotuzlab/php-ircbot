<?php

class Net_SmartIRC_module_Shabri
{

    private $irc;
    private $handlerids;

    public function __construct($irc)
    {
        $this->irc = $irc;
        $this->handlerids = array(
            $this->irc->registerActionHandler(SMARTIRC_TYPE_CHANNEL, '^test',
            	function ($irc, $data) {
                    $this->irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $data->nick.': I dont like tests! But then I am one :) hehe');
                }
            ),
        );
    }

    public function __destruct()
    {
        $this->irc->unregisterActionId($this->handlerids);
    }

}