<?php
namespace shakabra\cdb;


abstract class BaseView
{
    protected $data;
    protected $html_header;

    /* Renders the data. Normally called inside a controller's index function 
     * unless this view is passed to another view. */
    abstract protected function render();

    /* Wraps a view fragment in the appropriate tags. For example an HTML
     * view would use this to wrap text in HTML tags.
     */
    abstract protected function wrap_fragment($fragment);

    /* Combines all of the fragments before render. An HTML view might use this
     * to wrap some HTML with a header and footer. */
    abstract protected function finalize($fragments);


    public function __construct(array $data, BaseView $other_view = null)
    {
        $this->data = $data;
        $this->css = '<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">';
        $this->js = '<script src="assets/js/jquery.js"></script>';
        $this->html_header = $this->build_html_header();
    }

    private function build_html_header(/* array $header_scripts = $this->header_scripts */)
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
}
