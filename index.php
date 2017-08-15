<?php

/**
 * @file
 * Activate the bot.
 */

// Change default to your bot.
$botname = 'example';

// Do not modify --START--
// Prefer bot passed as argument.
if (isset($argv[1])) {
	$botname = $argv[1];
}
// Name the bot to activate.
define('BOT_NAME', $botname);

// Define project root.
define('INDEX_ROOT', __DIR__);

// Include files.
include_once(INDEX_ROOT.'/vendor/autoload.php');
// Workaround until psr-4 is implemented.
include_once(INDEX_ROOT.'/src/libraries/net_smartirc/library.net_smartirc.connector.php');

// Connect to IRC.
try
{
	(new Library_Net_Smartirc_Connector(BOT_NAME))->chatbot();
}
catch (Exception $e)
{
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// Do not modify --END--