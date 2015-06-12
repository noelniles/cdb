<?php
namespace shakabra\cdb;

class HomeView extends BaseView
{
    private $num_pages; 
    private $side_menu;

    /**
     * @param $data Array of documents.
     */
    public function __construct($data, SideMenuView $side_menu)
    {
        parent::__construct($data);
        $this->side_menu = $side_menu;
        $this->num_pages = count($data);
    }


    /**
     * Adds HTML to page without duplicating HTML head tag.
     *
     * @return string A bunch of HTML without a head tag
     */
    private function buildeach_page_without_header()
    {
        $page_fragment = '';

        for ($i = 0; $i < $this->num_pages; $i++) {

            if (isset($this->data[$i]->title)) {
                $page_fragment .= '<h4>'.$this->data[$i]->title.'</h4>'.PHP_EOL;
            }
            if (isset($this->data[$i]->author)) {
                $page_fragment .= '<h6>'.$this->data[$i]->author.'</h6>'.PHP_EOL;
            }
            if (isset($this->data[$i]->date)) {
                $page_fragment .= '<h6>'.$this->data[$i]->date.'</h6>'.PHP_EOL;
            }
            if (isset($this->data[$i]->html)) {
                $summary = explode('</p>', $this->data[$i]->html);
                $page_fragment .= $summary[0].PHP_EOL;
                $page_fragment .= '<br><a class="bold italic" href="#">contine reading...</a>'.PHP_EOL;
            }
        }
        return $page_fragment;
    }
    
    /**
     * Adds HTML fragments to the body without duplicating the CSS container.
     * 
     * @return string An HTML body with content and no head tag
     */
    protected function wrap_fragment($fragments)
    {
        $body  = '<body>' . PHP_EOL;
        $body .= '<div class="mui-container fluid">' . PHP_EOL;
        $body .= '<div class="mui-row">' . PHP_EOL;
        $body .= '<div class="mui-col-md-2">'.PHP_EOL;
        $body .= ($this->side_menu) ? $this->side_menu->render() : ''.PHP_EOL;
        $body .= '</div><!-- end mui-col-md2 side menu -->';
        $body .= '<div class="mui-col-md-9 offset-s2">' . PHP_EOL;
        $body .= $fragments . PHP_EOL;
        $body .= '</div><!-- end mui-col-md-9 offset-s2 content column -->'.PHP_EOL;
        $body .= '</div><!-- end mui-row -->'.PHP_EOL;
        $body .= '</div><!-- end  mui-container -->'.PHP_EOL;
        $body .= $this->incl_tags('javascript', ['src/res/js/materialize.js']);
        $body .= '</body>' . PHP_EOL;
        $body .= '</html>' . PHP_EOL;

        return $body;
    }

    /* Adds html header to fragments */
    protected function finalize($fragments)
    {
        $page_with_header = $this->html_header . $fragments;
        return $page_with_header;
    }
    
    public function render()
    {
        $frags = $this->buildeach_page_without_header();
        $body = $this->wrap_fragment($frags);
        $header = $this->build_html_header();
        printf("%s %s", $header, $body);
    }
}

