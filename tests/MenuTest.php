<?php
namespace shakabra\cdb;

require '../src/c/SideMenuController.php';

class MenuTest extends BaseTest
{
    private $test;

    public function __construct()
    {
        $this->test = new SideMenuController();
    }


    public function run()
    {
        $this->obj_vars($this->test);
    }
}
