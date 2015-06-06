<?php
$debug = true;
if ($debug)
    error_reporting(-1);

require 'vendor/autoload.php';
<<<<<<< HEAD

/* debugging -- remove or set to false in production */
use shakabra\cdb\dbghelper;
define('DEBUG', false);
$helper = new dbgHelper();

/* parses request and finds the approprate controller */
use shakabra\cdb\Router;
$router = new Router();
=======

use shakabra\cdb\Router;

echo "<br>";

foreach ($_SERVER as $k => $v) {
    printf("%s %s<br>", $k, $v);
}
$router = new Router($_SERVER['REQUEST_URI']);
?>
>>>>>>> 95916c11d4ebcdfd556e9a3768c5e21cca1e451d

