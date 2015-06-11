<?php
namespace shakabra\cdb;


abstract class BaseController
{
    /* the data store */
    private $model;

    /* data that is passed to the view */
    private $vw_data;

    /* this is where we get data from the model */
    abstract protected function gather_data();

    /* this is where the complete view gets rendered */
    abstract protected function index();
}

