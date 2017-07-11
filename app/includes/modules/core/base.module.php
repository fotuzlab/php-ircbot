<?php

include_once(__DIR__.'/../../workers/database.worker.php');

class Net_SmartIRC_module_Base
{

    private $irc;
    private $handlerids;

    public function __construct($irc)
    {
        $this->irc = $irc;
        $this->database = new Database('shabri');
        $dataset = $this->database->data();
        $this->handlerids = array();
        foreach ($dataset as $key => $value) {
            $this->value = $value;
            $this->key = $key;
            $this->handlerids[] = 
            $irc->registerActionHandler(SMARTIRC_TYPE_CHANNEL, $this->value->message, array($this, 'test')
            );
        }
    }

    public function __destruct()
    {
        $this->irc->unregisterActionId($this->handlerids);
    }

    // protected function createHandlerIds() {
    //     return $this->createHandlerIdsFromJsonDatabase();
    // }

    // private function createHandlerIdsFromJsonDatabase() {

    //     return $array_of_handlerids;
    // }

    function test($irc, $data) {
        $this->irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $data->nick.': '. $this->database->getResponse($data->message));
    }

}