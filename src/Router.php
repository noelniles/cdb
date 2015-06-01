<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseController;

class Router
{
    public function __construct()
    {
        $this->controller = new BaseController();
        if (basename($_SERVER['REQUEST_URI']) != 'cdb') {
            $this->controller->display_single_doc($_SERVER['REQUEST_URI']);
        } else {
            //serve the default
            echo $this->controller->display_all_docs('published');
            //$this->controller->display_side_menu();
        }
    }
}

