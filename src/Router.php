<?php
namespace shakabra\cdb;


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
                $prefix = __NAMESPACE__ . "\\" . ucfirst($value);
                $controller_name = $prefix . "Controller";
                //$this->cntl = new HomeController($value);
                $this->cntl = new $controller_name($value);
                $this->cntl->index();
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

