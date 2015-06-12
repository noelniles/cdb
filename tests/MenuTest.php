<?php
namespace shakabra\cdb;

require '../src/c/SideMenuController.php';

class MenuTest
{
    private $test;

    public function __construct()
    {
        $this->test = new SideMenuController();
    }

    private function obj_vars($obj)
    {
        $obj_vars = get_object_vars($obj);

        foreach ($obj_vars as $v) {
            if (is_object($v)) {
                var_dump($v);
                $this->obj_vars($v);
            } else {
                var_dump($v);
                echo '<br>';
            }
        }
    }

    public function run()
    {
        $this->obj_vars($this->test);
        var_dump($this->test->index());
    }
}
