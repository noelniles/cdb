<?php
namespace shakabra\cdb;

class BaseView
{
    private $title;
    private $author;
    private $date;
    private $html;
    protected $page;

    public function __construct($data)
    {
        $this->title = $data->title;
        $this->author = $data->author;
        $this->date = $data->date;
        $this->html = $data->html;
    }
    
    public function render_fragment()
    {
        
    }
    public function render()
    {
        $this->page = <<<HEAD
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>$this->title</title>
    <link rel="stylesheet" href="assets/css/materialize.css">
    <script src="assets/js/jquery.js"></script>
</head>

    <body>
    <div class="container">
        <h2>$this->title</h2>
        <h3>$this->author</h3>
        <h5>$this->date</h5>
        $this->html
    </div><!-- end main container -->
    </body>
</html>
HEAD;
        echo $this->page;
    }
}
