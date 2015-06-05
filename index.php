<?php
$debug = true;
if ($debug)
    error_reporting(-1);

require 'vendor/autoload.php';

use shakabra\cdb\Router;

echo "<br>";

foreach ($_SERVER as $k => $v) {
    printf("%s %s<br>", $k, $v);
}
$router = new Router($_SERVER['REQUEST_URI']);
?>

