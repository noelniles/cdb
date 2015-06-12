<?php
namespace shakabra\cdb;

class SideMenuView extends BaseView
{
    private $side_nav;

    public function __construct($data)
    {
        $this->side_nav = $this->side_menu($data);
    }

    /* Given $data = ['list header'  => ['i0', 'i1', 'i2'], 
                      'list header2' => ['i0', 'i1', 'i2'] ] 
       attempts to create an HTML unordered list. Ya know, a side menu.
     */
    private function side_menu($data)
    {
        $nav = '';
        $nav .= '<nav id="sidenav">';
        $nav .= '<ul>' . PHP_EOL;
        foreach ($data as $toplevel_item) {
            $nav .= '<li><a href="#!">'.key($data);
            $nav .= '</a></li>'.PHP_EOL;
        }
        $nav .= '<li><a href="#!">projects</a></li>'.PHP_EOL;
        $nav .= '<li><a href="#!">github</a></li>'.PHP_EOL;
        $nav .= '<li><a href="#!">experiments</a></li>'.PHP_EOL;
        $nav .= '<li><a href="#!">resume</a></li>'.PHP_EOL;
        $nav .= '</ul>'.PHP_EOL;
        $nav .= '</nav>';
        return $nav;
    }

    protected function wrap_fragment($fragment)
    {
        $html = '<div class="">';
        $html .= $fragment;
        $html .= '</div><!-- end side nav fragment -->';
        return $html;
    }

    protected function finalize($fragment)
    {
        return false;
    }

    protected function render()
    {
        return $this->side_nav;    
    }
}
