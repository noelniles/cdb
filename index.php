<?php
require 'vendor/autoload.php';

/* debugging -- remove or set to false in production */
use shakabra\cdb\dbghelper;
define('DEBUG', false);
$helper = new dbgHelper();

/* parses request and finds the approprate controller */
use shakabra\cdb\Router;
$router = new Router();
