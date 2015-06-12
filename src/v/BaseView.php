<?php
namespace shakabra\cdb;

abstract class BaseView
{
    protected $data;

    public function __construct(array $data, BaseView $other_view = null)
    {
        $this->data = $data;
    }

    /* shows the data */
    abstract protected function render();

    /* Creates tags for scripts, stylesheets etc... */
    protected function incl_tags($type='', array $inc=null, $top=null)
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
        if (is_array($inc)) {
            foreach ($inc as $href) {
                array_push($hrefs, $href);
            }
        }
        foreach ($hrefs as $href) {
            $tag = $st_tkn . $href . $end_tkn;
            return $tag;
        }
    } 
}

