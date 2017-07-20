<?php

include_once(INDEX_ROOT.'/vendor/autoload.php');

class Net_SmartIRC_module_Base
{

    private $irc;
    private $handlerids;

    public function __construct($irc)
    {
        $this->botname;
        $this->irc = $irc;
        $this->handlerids = $this->createHandlerIds();
    }

    public function __destruct()
    {
        $this->irc->unregisterActionId($this->handlerids);
    }

    protected function createHandlerIds() {
        return $this->createHandlerIdsFromJsonDatabase();
    }

    protected function createHandlerIdsFromJsonDatabase() {
        $this->database = new Database($this->botname);
        $dataset = $this->database->data();
        $array_of_handlerids = array();
        
        foreach ($dataset as $key => $value) {
            $this->value = $value;
            $this->key = $key;
            $array_of_handlerids[] = 
            $this->irc->registerActionHandler(SMARTIRC_TYPE_CHANNEL, $this->value->message, array($this, 'message')
            );
        }
        return $array_of_handlerids;
    }

    public function message($irc, $data) {
        $this->irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $data->nick.': '. $this->database->getResponse($data->message));
    }

}