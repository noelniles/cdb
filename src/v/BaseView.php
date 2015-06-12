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

    protected function build_html_header()
    {
        $html_header = '<!doctype html>'.PHP_EOL;
        $html_header .= '<html lang="en">'.PHP_EOL;
        $html_header .= '<head>'.PHP_EOL;
        $html_header .= '<meta charset="utf-8">'.PHP_EOL;
        $html_header .= $this->incl_tags('css', null, null);
        $html_header .= $this->incl_tags('css', ['src/res/css/mui-colors.css']);
        $html_header .= $this->incl_tags('css', ['src/res/css/style.css']);
        $html_header .= $this->incl_tags('javascript', null, true);
        $html_header .= $this->incl_tags('meta', ['http-equiv="X-UA-Compatible" content="IE-edge"',
                                                  'name="viewport" content="width=device-width, initial-scale=1"'], null);
        $html_header .= "<title>Home</title>".PHP_EOL;
        $html_header .= '</head>'.PHP_EOL;
        
        $this->html_header = $html_header;
        return $html_header;
    }    

    /* Creates tags for scripts, stylesheets etc... 
     * @param $type string : 'css', 'javascript', 'meta' ...
     * @param $inc  array  : array of valid attributes for the current $type
     * @param $top  bool   : if true then include javascript that needs to be 
     *                       at the top of the page
     */
    public function incl_tags($type='', array $inc=null, $top=null)
    {
        $hrefs = array();
        $tag = '';

        switch ($type) {
            
            case 'css':
                $st_tkn = '<link rel="stylesheet" type="text/css" href="';
                $end_tkn = '">';
                array_push($hrefs, 'src/res/css/mui.css');
                break;
            case 'javascript':
                $st_tkn = '<script rel="stylesheet" href="';
                $end_tkn = '" async></script>';

                /* this is here because jquery should be loaded at the top */
                if ($top) {
                    array_push($hrefs, 'src/res/js/jquery.js');
                }
                break;
            case 'meta':
                $st_tkn = '<meta ';
                $end_tkn = '>';
                break;
            default:
                break;
        }
        if (! is_null($inc)) {
            $hrefs = array_merge($inc, $hrefs);
        }

        foreach ($hrefs as $href) {
            $tag .= $st_tkn . $href . $end_tkn . PHP_EOL;
        }
        return $tag;
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
                    $fragment_string = file_get_contents($frag_location);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "whoops";
            }
            $this->frags[$frag_name] = $fragment_string;
        }
    }
}

