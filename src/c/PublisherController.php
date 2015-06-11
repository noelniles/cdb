<?php
namespace shakabra\cdb;


class PublisherController extends BaseController
{
    /* this is where we get data from the model */
    protected function gather_data()
    {
       return ['data from gather_data()']; 
    }

    /* this is where the complete view gets rendered */
    public function index()
    {
        $vw_data = $this->gather_data();
        $menu = new PublisherMenuView($vw_data);
        $view = new PublisherView($vw_data, $menu);
        $view->render();
    }
}

