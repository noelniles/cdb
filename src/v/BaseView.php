<?php
namespace shakabra\cdb;

abstract class BaseView
{
    protected $data;

    public function __construct(array $data, BaseView $other_view = null)
    {
        $this->data = $data;
    }

    /* shows the data */
    abstract protected function render();
}
