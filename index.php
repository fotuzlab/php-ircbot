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

// Define project root.
define('INDEX_ROOT', __DIR__);

// Check if the bot exists.
$bots = glob(INDEX_ROOT . '/bots/*' , GLOB_ONLYDIR);
$botnames = array();
foreach ($bots as $key => $bot) {
	$botnames[] = basename($bot);
}
if (!in_array($botname, $botnames)) {
	echo "No bot with name " . $botname . " found." . PHP_EOL;
	return;
}

// Name the bot to activate.
define('BOT_NAME', $botname);

// Include files.
include_once(INDEX_ROOT.'/vendor/autoload.php');
// Workaround until psr-4 is implemented.
include_once(INDEX_ROOT.'/src/irc/connect/irc.connect.net_smartirc.php');

// Connect to IRC.
try
{
	new IRC_Connect_Net_SmartIRC(BOT_NAME);
}
catch (Exception $e)
{
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// Do not modify --END--