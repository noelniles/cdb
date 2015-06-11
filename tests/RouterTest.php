<?php 
namespace shakabra\cdb;

include '../src/Router.php';

class RouterTest extends Router
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        if ($this->parse_uri_test()) {
            echo "<p>Router->parse_uri status: pass</p>";
        } else {
            echo "<p>Router->parse_uri status: fail</p>";
        }

        if ($this->parse_uri_returns_empty_array_given_root()) {
            echo "<p>parse_uri handles '/' correctly: pass</p>";
        } else {
            echo "<p>parse_uri barfed on root</p>";
        }
    }

    public function parse_uri_returns_empty_array_given_root()
    {
        $root_dir_test = $this->parse_uri('/');
        if (empty($root_dir_test)) {
            return true;
        } else {
            echo "<br>------------ incorrect result ---------------------<br>";
            var_dump($root_dir_test);
            echo "<br>+++++++++++++ expected result +++++++++++++++++++++<br>";
            $a = array();
            var_dump($a);
        } 
    }

    public function parse_uri_test()
    {
        $correct_result = ['first_key' => 'first_val',
            'second_key' => 'second_val',
            'third_key' => 'third_val'
        ];
        $test_uri = "/index.php?first_key=first_val+second_key=second_val+third_key=third_val"; 

        $result = $this->parse_uri($test_uri);

        if ($result == $correct_result) {
            return true;
        } else {
            echo "<br>------------- incorrect result --------------------<br>";
            var_dump($result);
            echo "<br>+++++++++++++ expected result +++++++++++++++++++++<br>";
            var_dump($correct_result);
            return false;
        }
    }
}
