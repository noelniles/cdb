<?php
namespace shakabra\cdb;


abstract class BaseTest
{
    abstract protected function run();
    
    protected function obj_vars($obj)
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
}
