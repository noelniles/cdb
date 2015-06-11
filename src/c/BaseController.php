<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseModel;

abstract class BaseController
{
    private $db;
    private $allpage_data;

    public function __construct($dbname)
    {
        "<br>base controller before model creation<br>";
        $this->db = new BaseModel($dbname);
        "<br>base controller after model creation<br>";
        $this->allpage_data = $this->db->fetchall_docs();
    }
}

