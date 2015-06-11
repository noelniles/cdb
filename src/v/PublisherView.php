<?php
namespace shakabra\cdb;


class PublisherView extends BaseView
{
    protected $data;

    public function __construct(array $data, PublisherMenu $other_view = null)
    {
        $this->data = $data;
    }

    protected function wrap_fragment($fragment)
    {
        return $fragment;
    }

    protected function finalize($fragments)
    {
        return $fragents;
    }

    /* shows the data */
    public function render()
    {
        print_r($this->data);
    }
}
