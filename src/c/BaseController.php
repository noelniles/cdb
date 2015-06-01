<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseModel;

class BaseController
{
    private $db;
    private $allpage_data;

    public function __construct()
    {
        $this->db = new BaseModel();   
        $this->allpage_data = $this->db->fetchall_docs('published');
    }

    /**
     * Builds a side menu from all the databases.
     * 
     * @return array The menu items and subitems ["item", subitems[], ...,]
     */
    public function display_side_menu()
    {
        $menu = array();
        $menu_items = $this->db->fetchall_dbs();
        $submenu = array();
        foreach ($menu_items as $dbname) {
            if (strpos($dbname, '_') !== 0) {
                $subitems = $this->db->fetchall_ids($dbname)->rows;
                for ($i = 0; $i < count($subitems); $i++) {
                    
                    $submenu[$i] = $subitems[$i]->id;
                }
                $menu[$dbname] = $submenu;
            }
        }
        return $menu;
    }
    /**
     * Used on the homepage if there is no request uri. Displays all docs.
     * 
     * @param string $databaseName
     * @param bool $summarize If true truncate the text at $doclength 
     * @return string Echoes the document to the browser
     * @todo Make the HTML formatting more graceful
     */
    public function display_all_docs($databaseName, $summarize=false)
    {
        $data = $this->allpage_data;
        $alldocs_view = new HomeView($data);
        return $alldocs_view->render();
    }

    /**
     * Used to display a single page.
     *
     * @param string $docname The name of the document to display
     * @return string Echoes HTML to the browser
     */
    public function display_single_doc($docname)
    {
        $data = array();
        $resp = $this->db->fetch_id(basename($docname)); 
        $vw->build_side_menu();
        //$vw->render();
    }
}

