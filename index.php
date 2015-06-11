<?php
define('LOCKDOWN', true);
error_reporting(-1);
require 'vendor/autoload.php';

/* parses request and finds the appropriate controller */
use shakabra\cdb\Router;
$router = new Router();
