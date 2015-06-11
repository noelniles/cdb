<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseController;

class Router
{
    private $cntl;
    private $request_uri;
    private $params = array();

    public function __construct()
    {
        $this->request_uri = $_SERVER['REQUEST_URI'];
        $this->params = $this->parse_uri($this->request_uri);
        $this->dispatch($this->params);
    }
    
    /* Maps queries to routes.
     * @param $params assoc array of queries created by parse_uri() 
     */
    private function dispatch($params)
    {
        foreach ($params as $key => $value) {
            if ($key == 'p') {
                switch ($value) {
                    case 'posts':
                        echo '<h1>Posts Controller</h1>';
                        // $this->cntl = new PostsController($params);
                        break;
                    case 'home':
                        echo '<h1>Home Controller</h1><br>';
                        print_r($params);
                        $this->cntl = new HomeController($params);
                        $this->cntl->all_docs();
                        break;
                    case 'projects':
                        echo '<h1>Projects Controller</h1>';
                        // $this->cntl = new ProjectsController($params);
                        break;
                    case 'experiments':
                        echo '<h1>Experiments Controller</h1>';
                        // $this->cntl = new ExperimentsController($params);
                        break;
                    case 'cv':
                        echo '<h1>CV Controller</h1>';
                        // $this->cntl = new CVController($params);
                        break;
                    default:
                        echo '<h1>Default Controller</h1>';
                        // $this->cntl = new DefaultController($params);
                } 
            }
        }
    }

    /* Turns a query string into an assoc array. The key/values in the query 
     * must be separated by '+' for this function to work.
     */
    protected function parse_uri($uri)
    {
        $uri = parse_url($uri, PHP_URL_QUERY);
        $uri = explode('+', $uri);

        $params = array();
        foreach ($uri as $param) {
            $item = explode('=', $param);
            if (! empty($item[1])) {
                $params[$item[0]] = $item[1];
            }
        }
        return $params;
    }    
}

