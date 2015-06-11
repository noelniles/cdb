<?php
namespace shakabra\cdb;


class HomeController extends BaseController
{

    public function __construct($params)
    {
        /* Home view uses the 'published' database. */
        $this->dbname = 'published';
        $this->model = new HomeModel($this->dbname);
    }

    /* Gathers all the published posts for the home view. */
    protected function gather_data()
    {
        $data = array();
        /* array of document ids */
        $ids = $this->model->ids();

        foreach($ids as $id) {
            $query = $this->dbname . DIRECTORY_SEPARATOR . $id;
            array_push($data, $this->model->run($query));
        }
        return $data;
    }
    
    public function index()
    {
        /* get home page data */
        $vw_data = $this->gather_data();

        /* home page has a side menu */
        $side_menu = new SideMenuController();
        $side_menu = $side_menu->index();

        /* pass all the data to the home view */
        $view = new HomeView($vw_data, $side_menu);

        /* show the page */
        $view->render();
    }
}
