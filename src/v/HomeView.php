<?php
namespace shakabra\cdb;

class HomeView implements BaseView
{
    private $css;
    private $js;
    private $data;
    private $num_pages; 

    /**
     * @param $data Array of documents.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->num_pages = count($this->data);
        $this->css = '<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">';
        $this->js = '<script src="assets/js/jquery.js"></script>';
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
        $html_header .= $this->css.PHP_EOL;
        $html_header .= $this->js.PHP_EOL;
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
        $allpages_without_header = '';
        $page_fragment = '';

        for ($i = 0; $i < $this->num_pages; $i++) {
            $page_fragment .= '<h2>'.$this->data[$i]->title.'</h2>'.PHP_EOL;
            $page_fragment .= '<h3>'.$this->data[$i]->author.'</h3>'.PHP_EOL;
            $page_fragment .= '<h5>'.$this->data[$i]->date.'</h5>'.PHP_EOL;
            $page_fragment .= $this->data[$i]->html.PHP_EOL;
        }
        $allpages_without_header = $page_fragment;
        return $allpages_without_header;
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
        $valid_html_page = $this->add_header_to_fragments($body);
        return $valid_html_page;
    }
}

