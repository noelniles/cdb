<?php 
namespace shakabra\cdb;


class RouterTest extends BaseTest
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function parse_uri_returns_correct_result()
    {
        $parse_uri_test_args = ['index.php?p=page+q=query'];
        $method = new \ReflectionMethod('shakabra\cdb\Router', 'parse_uri');
        $method->setAccessible(true);
        $result = $method->invokeArgs(new Router(), $parse_uri_test_args);
        $expected_result = ["p" => "page", "q" => "query"];

        if ($result === $expected_result) {
            return true;
        } else {
            return false;
        }
    }

    public function run()
    {
        $this->obj_vars($this->router);
    }
}
