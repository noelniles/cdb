<?php
namespace shakabra\cdb;

class HomeView extends BaseView
{
    private $num_pages;    /* used to control the loop over the database */ 
    private $side_menu;    /* another view */

    /**
     * @param $data Array of documents.
     */
    public function __construct($data, SideMenuView $side_menu)
    {
        parent::__construct($data);
        $this->side_menu = $side_menu;
        $this->num_pages = count($data);
    }

    /* Pulls out 'title', 'author', 'date' and 'html' to build the home view.
     */
    private function buildeach_page_without_header()
    {
        $allpages_without_header = '';
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
        $allpages_without_header = $page_fragment;
        return $allpages_without_header;
    }
    
    /**
     * Adds HTML fragments to the body without duplicating the CSS container.
     * 
     * @return string An HTML body with content and no head tag
     */
    protected function wrap_fragment($fragments)
    {
        $body  = '<body>' . PHP_EOL;
        $body .= '<div class="container">' . PHP_EOL;
        $body .= '<div class="row">' . PHP_EOL;
        $body .= '<div class="col s2">'.PHP_EOL;
        $body .= $this->side_menu->render().PHP_EOL;
        $body .= '</div><!-- end col s2 side menu -->';
        $body .= '<div class="col s9 offset-s2">' . PHP_EOL;
        $body .= $fragments . PHP_EOL;
        $body .= '</div><!-- end col s9 offset-s2 content column -->'.PHP_EOL;
        $body .= '</div><!-- end row -->'.PHP_EOL;
        $body .= '</div><!-- end  container -->'.PHP_EOL;
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
        $frags= $this->buildeach_page_without_header();
        $body = $this->wrap_fragment($frags);
        $valid_html_page = $this->finalize($body);
        echo $valid_html_page;
    }
}

