<?php

include_once(INDEX_ROOT.'/core/components/irc/connect/irc.connect.php');

define('BOT_NAME', basename(__FILE__, '.bot.php'));

new Connect_Bot(BOT_NAME);
