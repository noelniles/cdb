<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseModel;


class SideMenuController extends HomeController
{
    public function __construct()
    {
        $this->model = new BaseModel('published');
        $this->vw_data = $this->gather_data();
        $this->view = new SideMenuView($this->vw_data);
    }    

    public function index()
    {
        return $this->view;
    }

    protected function gather_data()
    {
        $menu = array();
        $menu_items = $this->model->dbs();
        $submenu = array();

        foreach ($menu_items as $dbname) {
            if (strpos($dbname, '_') !== 0) {
                $subitems = $this->model->ids($dbname);
                for ($i = 0; $i < count($subitems); $i++) {
                    $submenu[$i] = $subitems[$i];
                }
                $menu[$dbname] = $submenu;
            }
        }
        return $menu;
    }
}
