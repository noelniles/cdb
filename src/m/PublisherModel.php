<?php
namespace shakabra\cdb;

/**
 * Handles CouchDB.
 */ 
class PublisherModel extends BaseModel
{
    public function __construct($dbname)
    {
        $this->dbname = $dbname;
    }
    public function run($uri)
    {}
    public function dbs()
    {}
    public function ids()
    {}
}

