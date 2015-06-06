<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseController;

class Router
{
<<<<<<< HEAD
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
=======
    private $cntl; /* controller */
    private $reqd; /* requested resource */
    private $okay_routes = ["home",
                            "git",
                            "projects",
                            "posts",
                            "cv"
                           ];

    public function __construct($requested)
    {
        echo "<br>Router contruction begining<br>";
        $this->cntl = new BaseController();
        $this->reqd = $this->parse_request($requested);
        $this->find_requested_controller($this->reqd);
    }
    
    public function __destruct()
    {
        echo "<br>Destroying the router</br>";
    } 
    
    private function parse_request($request)
    {
        $parsed_request = parse_url($request);
        $parsed_request["params"] = explode("&", $parsed_request["query"]);
    }
    
    /* @param request string
     * @return void
     */
    private function find_requested_controller($requested)
    {
        if (in_array($requested, $this->okay_routes)) {
            /* route $r to appropriate controller */
            echo "<br>sweet route bro</br>";

        } else {
            /* report that $r is unroutable */
            echo "<br>no bueno</br>";
>>>>>>> 95916c11d4ebcdfd556e9a3768c5e21cca1e451d
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

