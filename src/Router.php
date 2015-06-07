<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseController;

class Router
{
    private $cntl;
    private $dbname;
    private $request_uri;
    /* routes correspond to controllers */
    private $ok_routes = ["home", "posts", "projects", "experiments", "cv"];
    private $query_keys = ["p"];
    private $params = [];

    public function __construct()
    {
        $this->request_uri = $_SERVER['REQUEST_URI'];
        $this->params = $this->parse_uri($this->request_uri);
        $this->dispatch($this->params);
        //$this->dbname = $this->parse_uri($this->request_uri);
        //$this->cntl->all_docs();
    }

    private function dispatch($params)
    {
        foreach ($params as $key => $value) {
            if ($key == 'p') {
                echo "found one";
                switch ($value) {
                    case 'posts':
                        echo '<h1>Posts Controller</h1>';
                        // $this->cntl = new PostsController($params);
                        break;
                    case 'home':
                        echo '<h1>Home Controller</h1>';
                        // $this->cntl = new HomeController($params);
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
    private function parse_uri($uri)
    {
        $uri = parse_url($uri, PHP_URL_QUERY);
        $uri = explode('+', $uri);

        $params = array();
        foreach ($uri as $param) {
            $item = explode('=', $param);
            $params[$item[0]] = $item[1];
        }
        return $params;
    }    
}

