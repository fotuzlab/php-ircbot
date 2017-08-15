<?php

/**
 * This module implements chatbot functionality using API provided
 * by Net_SmartIRC library.
 * More modules can be created on the same lines.
 */
class Library_Net_Smartirc_Module_Chatbot
{
    public $name        = '';
    public $description = '';
    public $author      = '';
    public $license     = '';

    private $irc;
    private $handlerids;
    private $botname;
    
    /**
     * Constructor.
     * Register handlerids.
     */
    public function __construct($irc, $botname)
    {
        $this->irc = $irc;
        $this->botname = $botname;
        $this->handlerids = $this->createHandlerIds();
    }

    /**
     * Destuctor.
     * Unregister handlerids.
     */
    public function __destruct()
    {
        $this->irc->unregisterActionId($this->handlerids);
    }

    /**
     * Create handler ids from local database.
     * You can take clue from this method to create your own if you want to
     * use another database source than like default JSON file architecture.
     * @see
     *  Net_SmartIRC_module_Base::createHandlerIds()
     * @return
     *  (array) Id of handlerids.
     */
    private function createHandlerIds() {
        // Get data.
        $this->dataset = (new Controller_Database())->get($this->botname);

        $array_of_handlerids = array();
        
        // Iterate over data.
        foreach ($this->dataset as $key => $value) {
            $this->value = $value;
            $this->key = $key;
            // Register multiple action handlers.
            $array_of_handlerids[] = 
            $this->irc->registerActionHandler(SMARTIRC_TYPE_CHANNEL, $this->value->message, array($this, 'message')
            );
        }
        return $array_of_handlerids;
    }

    /**
     * Format message for Net_SmartIRC object.
     * Default format will post the message like:
     * <responding to>: Response
     */
    public function message($irc, $data) {
        $this->irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $data->nick . ': '. $this->getResponse($data->message));
    }

    /**
     * Map message and response.
     * @param
     *  (array) Message.
     * @return
     *  (array) Response.
     */
    private function getResponse($message) {

        foreach ($this->dataset as $key => $value) {
            if (preg_match($value->message, $message) == 1) {
                return $value->response;
            }
        }

    }
}