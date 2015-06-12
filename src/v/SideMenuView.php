<?php
namespace shakabra\cdb;

class SideMenuView extends BaseView
{
    private $side_nav;

    public function __construct($data)
    {
        $this->side_nav = $this->side_menu($data);
    }

    private function side_menu($data)
    {
        $nav = '<ul>' . PHP_EOL;
        foreach ($data as $toplevel_item) {
            $nav .= '<li><a href="#!">'.key($data);
            $nav .= '</a></li>'.PHP_EOL;
        }
        $nav .= '<li><a href="#!">projects</a></li>'.PHP_EOL;
        $nav .= '<li><a href="#!">github</a></li>'.PHP_EOL;
        $nav .= '<li><a href="#!">experiments</a></li>'.PHP_EOL;
        $nav .= '<li><a href="#!">resume</a></li>'.PHP_EOL;
        $nav .= '</ul>'.PHP_EOL;

        return $nav;
    }

    protected function render()
    {
        return $this->side_nav;    
    }
}
