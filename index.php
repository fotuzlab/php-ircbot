<?php

define('INDEX_ROOT', __DIR__);

// Autoload bots.
$bots = glob(INDEX_ROOT . '/app/*' , GLOB_ONLYDIR);

// Manually load bots.
// $bots = array();

foreach ($bots as $bot) {
	$bot = basename($bot);
	include_once('app/' . $bot . '/' . $bot . '.bot.php');
}