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
       $this->incl_fragment(['publisher_form' => 'frag/PublisherFormFrag.html']); 
    }

    /* shows the data */
    public function render()
    {
        $this->publisher_html();
        print_r($this->frags);
        //echo $frags['publisher_form'];
    }
}
