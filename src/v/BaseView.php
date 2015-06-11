<?php
namespace shakabra\cdb;

abstract class BaseView
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    abstract protected function render();
}
