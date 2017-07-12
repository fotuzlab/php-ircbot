<?php

define('BOT_NAME', basename(__FILE__, '.bot.php'));

include_once(__DIR__.'/../../core/components/irc/connect/irc.connect.php');

new Connect_Bot(BOT_NAME);

