<?php

require_once "../vendor/autoload.php";

use lisnyak\mvc\core\Core;

error_reporting(E_ALL);

/* @var  $core \lisnyak\mvc\core\Core */
$config = require(__DIR__ . "/../src/config/config.php");

$core = Core::getInstance();
$core->run($config);
Core::getInstance()->obj;


