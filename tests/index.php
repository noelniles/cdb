<?php
namespace shakabra\cdb; 
require '../vendor/autoload.php';
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Index of CDB Tests</title>
</head>

<body>

<h2>Router Test</h2>
<?php
$router_test = new RouterTest();
$router_test->run();
?>

<h2>MenuTest</h2>
<?php
$menu_test = new MenuTest();
$menu_test->run();
?>
</body>
</html>
