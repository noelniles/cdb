<?php
namespace shakabra\cdb;

/**
 * Handles CouchDB.
 */ 
class BaseModel
{
    private $dbname;
    protected $vw_data;
    
    public function __construct($dbname)
    {
        $this->dbname = $dbname;
    }

    /* Executes the curl command on a database resource.
     * @param string $uri The path to the couchdb resource
     * @return array
     */
    public function run($uri)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:5984/'.$uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_VERBOSE, false); 
        $resp = curl_exec($ch);
        return json_decode($resp);
    }

    /* Used mostly to make menus of databases.
     * @return array All of the databases ex: ['db1', 'db2',...,'dbN']
     */
    public function dbs()
    {
        $action = '_all_dbs';
        $dbs = $this->run($action);
        return $dbs;
    }

    /**
     * Fetches all of the ids from the database
     * @param string The name of the database
     */
    public function ids()
    {
        $action = $this->dbname . DIRECTORY_SEPARATOR . '_all_docs';
        $rows = $this->run($action)->rows;
        $ids = array();

        foreach ($rows as $row) {
            array_push($ids, $row->id);
        }
        return $ids;
    }
}

