<?php
require_once 'c/BaseController.php';

class Router
{
    public function __construct()
    {
        $this->controller = new BaseController();
        if (basename($_SERVER['REQUEST_URI']) != 'cdb') {
            $this->controller->display_single_doc($_SERVER['REQUEST_URI']);
        } else {
            //serve the default
            $this->controller->display_all_docs('published');
        }
    }
}

