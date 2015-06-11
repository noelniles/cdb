<?php
namespace shakabra\cdb;

class SideMenuView extends BaseView
{
    private $side_menu;

    public __construct()
    {
        $this->side_menu = $data['side_menu'];
    }

    private function side_menu()
    {
        foreach ($this->side_menu as $toplevel_item) {
            $nav .= '<li><a href="#!">'.key($this->side_menu);
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
        echo $this->side_menu;    
    }
}
