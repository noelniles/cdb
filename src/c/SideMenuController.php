<?php
namespace shakabra\cdb;

use shakabra\cdb\BaseModel;


class SideMenuController extends BaseController
{
    public __construct($dbname)
    {
        echo "<br>side menu controller<br>";
        parent::__construct($dbname);
        $menu_data = $this->side_menu_data();
        $this->side_menu_view = new SideMenuView($menu_data);
    }    

    /**
     * Builds a side menu from all the databases.
     * 
     * @return array The menu items and subitems ["item", subitems[], ...,]
     */
    private function side_menu_data()
    {
        $menu = array();
        $menu_items = $this->db->fetchall_dbs();
        $submenu = array();

        foreach ($menu_items as $dbname) {

            if (strpos($dbname, '_') !== 0) {

                $subitems = $this->db->fetchall_ids($dbname);

                for ($i = 0; $i < count($subitems); $i++) {
                    $submenu[$i] = $subitems[$i];
                }
                $menu[$dbname] = $submenu;
            }
        }
        return $menu;
    }
}
