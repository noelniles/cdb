<?php

class BaseView
{
    public function __construct($data)
    {
        $this->page = <<<HEAD
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>$data->title</title>
    <link rel="stylesheet" href="assets/css/materialize.css">
    <script src="assets/js/jquery.js"></script>
</head>

    <body>
    <div class="container">
        <h2>$data->title</h2>
        <h3>$data->author</h3>
        <h5>$data->date</h5>
        $data->html
    </div><!-- end main container -->
    </body>
</html>
HEAD;
    }

    public function render()
    {
        echo $this->page;
    }
}
