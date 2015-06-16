<?php
namespace shakabra\cdb;

class HomeTest extends BaseTest
{

    private $test; 

    public function __construct()
    {
        $this->test = new HomeController();
    }

    public function run()
    {
       $this->obj_vars($this->test); 
    }
}
