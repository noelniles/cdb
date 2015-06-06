<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseController;

class Router
{
    private $cntl;
    private $dbname;
    private $request_uri;

    public function __construct()
    {
        $this->request_uri = $_SERVER['REQUEST_URI'];
        $this->dbname = $this->parse_uri($this->request_uri);
        $this->cntl = new BaseController($this->dbname);
        if (DEBUG) {
            $this->dump_object();
        }
        $this->cntl->all_docs();
    }

    private function parse_uri($uri)
    {
        if (empty($uri)) {
            return false;
        } else {
            $requested_db = 'published';
        } 
        echo "<h1>SUCCESS</h1>";
        return $requested_db;
    }    
}

