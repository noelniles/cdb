<?php
namespace shakabra\cdb;


abstract class BaseView
{
    protected $data;
    protected $html_header;
    public $frags;

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
    }

    /* Creates tags for scripts, stylesheets etc... */
    public function incl_tags($type='', array $inc=null, $top=null)
    {
        $hrefs = array();

        switch ($type) {
            
            case 'css':
                $st_tkn = '<link rel="stylesheet" type="text/css" href="';
                $end_tkn = '">' . PHP_EOL;
                array_push($hrefs, 'src/res/css/materialize.css');
                break;
            case 'javascript':
                $st_tkn = '<script rel="stylesheet" href="';
                $end_tkn = '"></script>' . PHP_EOL;

                if ($top) {
                    array_push($hrefs, 'src/res/js/jquery.js');
                }
                break;
            case 'meta':
                break;
            default:
                break;
        }
        foreach ($hrefs as $href) {
            $tag = $st_tkn . $href . $end_tkn;
            return $tag;
        }
        if (is_array($inc)) {
            array_merge($hrefs, $href);
        }
    } 

    /* Grabs a page fragment directly from a file without going through the 
       whole riggamarole of catting strings together.
     */ 
    protected function incl_fragment(array $page_fragments)
    {
        $fragment_string = '';
        $fragment_array = array();
        foreach ($page_fragments as $frag_name => $frag_location) {
            if (file_exists($frag_location)) {
                try {
                    $fragment_string = file_get_contents($frag);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
            $this->frags[$frag_name] = $fragment_string;
        }
    }
}

