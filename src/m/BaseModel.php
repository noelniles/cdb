<?php
namespace shakabra\cdb;

/**
 * Handles CouchDB.
 */ 
class BaseModel
{
    /**
     * Executes the curl command on a database resource.
     *
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

    /** 
     * Used mostly to make menus of databases.
     *
     * @return array All of the databases ex: ['db1', 'db2',...,'dbN']
     */
    public function fetchall_dbs()
    {
        $action = '_all_dbs';
        $alldbs = $this->exec_dbaction($action);
        return $alldbs;
    }
    
    /** 
     * Actually fetches by id name--a misnomer.
     *
     * @param string $idname The id of the document to fetch
     * @return array Single document from the database
     * @todo Fix the misnomerism
     */
    public function fetch_id($idname)
    {
        $action = '/published/'.$idname;
        $article = $this->exec_dbaction($action);
        return $article;
    }

    /**
     * Fetches all of the ids from the database
     *
     * @param string The name of the database
     */
    public function fetchall_ids($databaseName)
    {
        $action = $databaseName . '/_all_docs';
        $ids = $this->exec_dbaction($action);
        return $ids;
    }

    /**
     * Fetches all of the documents in the database.
     *
     * @param string $databaseName
     * @return array 
     */ 
    public function fetchall_docs($databaseName)
    {   
        $all_docs = array();
        /* array of document ids */
        $ids = $this->fetchall_ids($databaseName);

        foreach($ids->rows as $docinfo) {
            $id = $docinfo->id;
            array_push($all_docs, $this->exec_dbaction($databaseName.'/'.$id));
        }
        return $all_docs;
    }
}

