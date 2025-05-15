<?php
/**
 * Plugin Name: E-Shrines
 * Plugin URI: https://github.com/dashifen/e-shrine
 * Description: A WordPress plugin for the production of e-shrines.
 * Author: David Dashifen Kees
 * Version: 1.0.0
 * License: MIT
 */

namespace Dashifen\WordPress\Plugins;

use Dashifen\Exception\Exception;
use Dashifen\WordPress\Plugins\eShrines\ShrineHandler;

defined('ABSPATH') or die;

if (!class_exists(ShrineHandler::class)) {
  require __DIR__ . '/vendor/autoload.php';
}

(function() {
  try {
    $shrineHandler = new ShrineHandler();
    $shrineHandler->initialize();
  } catch (Exception $e) {
    ShrineHandler::catcher($e);
  }
})();
