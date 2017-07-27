<?php

/**
 * @file
 *  Define defaults and common functions.
 */

// Define INDEX_ROOT.
define('INDEX_ROOT', __DIR__ . '/../../..');
// Autoload files.
include_once(INDEX_ROOT . '/vendor/autoload.php');

// Pick example bot to test.
define('BOT', 'example');