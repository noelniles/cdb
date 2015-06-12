<?php
namespace shakabra\cdb;


class PublisherView extends HomeView
{
    protected $data;

    public function __construct(array $data, PublisherMenuView $other_view = null)
    {
        $this->data = $data;
        $this->side_menu = new SideMenuController();
        $this->side_menu = $this->side_menu->index();
    }

    private function publisher_html()
    {
        $this->incl_fragment(['publisher_form' => 'src/v/frags/PublisherFormFrag.html']); 
        return $this->frags;
    }

    /* shows the data */
    public function render()
    {
        $fragment = $this->publisher_html();
        $body = $this->wrap_fragment($fragment['publisher_form']);
        $header = $this->build_html_header();
        $this->frags['publisher_form'];
        printf("%s %s", $header, $body);
    }
}
