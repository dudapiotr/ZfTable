<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Advance extends AbstractTable
{

    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50'),
        'name' => array('title' => 'Name'),
        'surname' => array('title' => 'Surname'),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active'),
    );

    public function init()
    {
        
        
    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}