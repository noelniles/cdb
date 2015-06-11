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
        $nav = '';
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

    protected function wrap_fragment($fragment)
    {
        $html = '<div class="">';
        $html .= $fragment;
        $html .= '</div><!-- end side nav fragment -->';
        return $html;
    }

    protected function render()
    {
        $frag = $this->side_nav;
        $menu = $this->wrap_fragment($frag);
        echo $menu; 
    }
}
