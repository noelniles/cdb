<?php
namespace shakabra\cdb;

/**
 * Handles CouchDB.
 */ 
class BaseModel
{
    public function __construct($dbname)
    {
        $this->dbname = $dbname;
    }

    /* Executes the curl command on a database resource.
     * @param string $uri The path to the couchdb resource
     * @return array
     */
    private function exec_dbaction($uri)
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
    public function fetchall_dbs()
    {
        $action = '_all_dbs';
        $alldbs = $this->exec_dbaction($action);
        return $alldbs;
    }
    
    /* Actually fetches by id name--a misnomer.
     * @param string $idname The id of the document to fetch
     * @return array Single document from the database
     * @todo Fix the misnomerism
     */
    public function fetch_id($idname)
    {
        $action = $this->dbname.$idname;
        $article = $this->exec_dbaction($action);
        return $article;
    }

    /**
     * Fetches all of the ids from the database
     *
     * @param string The name of the database
     */
    public function fetchall_ids()
    {
        $action = $this->dbname. '/_all_docs';
        $rows = $this->exec_dbaction($action)->rows;
        $ids = array();

        foreach ($rows as $row) {
            array_push($ids, $row->id);
        }
        return $ids;
    }

    /**
     * Fetches all of the documents in the database.
     *
     * @param string $databaseName
     * @return array 
     */ 
    public function fetchall_docs()
    {   
        $all_docs = array();
        /* array of document ids */
        $ids = $this->fetchall_ids();

        foreach($ids as $docinfo) {
            //@todo FIX THIS SHIT
            $id = $docinfo;
            array_push($all_docs, $this->exec_dbaction($this->dbname.'/'.$id));
        }
        return $all_docs;
    }
}

