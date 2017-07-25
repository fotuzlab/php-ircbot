<?php

/**
 * @file
 *  Include or extend.
 */

/**
 * Base class to create message handlers for the bot.
 */
class Net_SmartIRC_module_Base
{

    private $irc;
    private $handlerids;

    /**
     * Constructor.
     * Create IRC handlers required by NET_SmartIRC library.
     * @param
     *  $irc: IRC object.
     */
    public function __construct($irc)
    {
        $this->botname;
        $this->irc = $irc;
        $this->handlerids = $this->createHandlerIds();
    }

    /**
     * Destructor.
     * Unregister handlerids.
     */
    public function __destruct()
    {
        $this->irc->unregisterActionId($this->handlerids);
    }

    /**
     * Create handlerids.
     * Override this method to modify handlerids.
     * In most cases this method should work. However, if you have modified the
     * source of the database and its format, you may need to override this 
     * method to make corresponding changes.
     * @see
     *  Net_SmartIRC_module_Base::createHandlerIdsFromJsonDatabase()
     * @see
     *  Config::config()
     * @see
     *  Database::data()
     */
    protected function createHandlerIds() {
        return $this->createHandlerIdsFromJsonDatabase();
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
    protected function createHandlerIdsFromJsonDatabase() {
        // Create database object.
        $this->database = new Database($this->botname);
        // Get data.
        $dataset = $this->database->data();
        $array_of_handlerids = array();
        
        // Iterate over data.
        foreach ($dataset as $key => $value) {
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
        $this->irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $data->nick.': '. $this->database->getResponse($data->message));
    }

}