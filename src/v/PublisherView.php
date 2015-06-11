<?php
namespace shakabra\cdb;


class PublisherView extends BaseView
{
    protected $data;

    public function __construct(array $data, PublisherMenuView $other_view = null)
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
    
    private function publisher_html()
    {
        $html  = '<label for="title">title</label>';
        $html .= '<input type="text" id="title" placeholder="title">'; 

        $html .= '<label for="author">author</label>';
        $html .= '<input type="text" id="author" placeholder="author">'; 

        $html .= '<label for="date">date</label>';
        $html .= '<input type="text" id="date" placeholder="date">'; 

        $html .= '<label for="date">date</label>';
        $html .= '<input type="text" id="date" placeholder="date">'; 

        $html .= '<label for="body">body</label>';
        $html .= '<input type="text" id="body" placeholder="body">'; 

        $html .= '<button type="button">Save</button>';
        $html .= '<button type="button">Publish</button>';

        return $html;
    }

    /* shows the data */
    public function render()
    {
        echo $this->publisher_html();
    }
}
