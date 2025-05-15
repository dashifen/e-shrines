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
use Dashifen\WordPress\Plugins\eShrines\Agents\RegistrationAgent;
use Dashifen\WPHandler\Agents\Collection\Factory\AgentCollectionFactory;

defined('ABSPATH') or die;

if (!class_exists(ShrineHandler::class)) {
  require __DIR__ . '/vendor/autoload.php';
}

(function() {
  try {
    $shrineHandler = new ShrineHandler();
    $agentCollectionFactory = new AgentCollectionFactory();
    $agentCollectionFactory->registerAgent(RegistrationAgent::class);
    $shrineHandler->setAgentCollection($agentCollectionFactory);
    $shrineHandler->initialize();
  } catch (Exception $e) {
    ShrineHandler::catcher($e);
  }
})();
