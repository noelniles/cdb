<?php
namespace shakabra\cdb;

class dbgHelper
{
    private $that;

    public function __construct($that)
    {
        $this->that = $that;
        if (DEBUG) {
            $this->dump_object();
        }
    }
    private function dump_object()
    {
        $obj_vars = get_object_vars($this);
        foreach ($obj_vars as $var) {
            printf("%s<br>", var_dump($var));
        }
    }
}
