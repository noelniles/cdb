<?php
namespace shakabra\cdb;

class HomeController extends BaseController
{
    private $home_data;
    private $menu_data;

    public function __construct($dbname)
    {
        parent::__construct($dbname);   
        $this->home_data = $this->all_page_data;
    }

    /* Used on the homepage if there is no request uri. Displays all docs.
     * @param string $databaseName
     * @param bool $summarize If true truncate the text at $doclength 
     * @return string Echoes the document to the browser
     */
    public function all_docs($summarize=false)
    {
        $alldocs_view = new HomeView($data);
        $alldocs_view->render();
    }
}
