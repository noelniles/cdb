<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseController;

class Router
{
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
        }
    }
}

