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

    /* Inserts css and js into HTML head tag 
     *
     * @return string HTML head tag 
     */
    private function build_html_header()
    {
        $html_header = '<!doctype html>'.PHP_EOL;
        $html_header .= '<html lang="en">'.PHP_EOL;
        $html_header .= '<head>'.PHP_EOL;
        $html_header .= '<meta charset="utf-8">'.PHP_EOL;
        $html_header .= $this->incl_tags('css', null, null);
        $html_header .= $this->incl_tags('javascript', null, true);
        $html_header .= "<title>Home</title>".PHP_EOL;
        $html_header .= '</head>'.PHP_EOL;

        return $html_header;
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
    private function add_fragments_to_body($fragments)
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

    /**
     * Adds HTML header to a bunch of HTML fragments.
     *
     * @return string A (hopefully) valid HTML page.
     */
    private function add_header_to_fragments($fragments)
    {
        $html_head = $this->build_html_header();     
        $fragments_without_header = $fragments; 
        $page_with_header = $html_head . $fragments_without_header;
        return $page_with_header;
    }

    /**
     * Echoes a theorectically valid HTML page to the browser
     *
     * @return string
     */
    public function render()
    {
        $frags= $this->buildeach_page_without_header();
        $body = $this->add_fragments_to_body($frags);
        $header = $this->build_html_header();
        printf("%s %s", $header, $body);
    }
}

