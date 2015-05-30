<?php
require_once 'c/BaseController.php';
require_once 'm/BaseModel.php';
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/materialize.css">
<script src="assets/js/jquery.js"></script>
</head>
<body>
<?php
$bc = new BaseController();
if (basename($_SERVER['REQUEST_URI']) != 'cdb') {
    echo '  <div class="row">'."\n";
    echo '  <div class="col s9 offset-s2">'."\n"; 
    $bc->display_single_doc($_SERVER['REQUEST_URI']);
    echo '  </div><!-- end content col -->'."\n";
} else {
    echo '<div class="container">'."\n";
    echo '  <div class="row">'."\n";
    echo '  <div class="col s2">'."\n"; 
    $bc->docs_asmenu();
    echo '  </div><!-- end menu col -->'."\n";
    
    echo '  <div class="col s9 offset-s2">'."\n"; 
    $bc->display_all_docs('published', true);
    echo '  </div><!-- end content col -->'."\n";
    echo '  </div><!-- end row -->'."\n";
    echo '</div><!-- end container -->'."\n";
}
?>
<script src="assets/js/materialize.js"></script>
</body>
</html>
