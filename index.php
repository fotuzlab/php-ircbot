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

// Check if the bot exists.
$bots = glob(INDEX_ROOT . '/bots/*' , GLOB_ONLYDIR);
if (!in_array($botname, $bots)) {
	echo "No bot with name " . $botname . " found.";
	return;
}

// Define project root.
define('INDEX_ROOT', __DIR__);
// Name the bot to activate.
define('BOT_NAME', $botname);

// Include files.
include_once(INDEX_ROOT.'/vendor/autoload.php');
include_once(INDEX_ROOT.'/core/components/irc/irc.connect.php');

try
{
	new Connect_Bot(BOT_NAME);
}
catch (Exception $e)
{
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// Do not modify --END--