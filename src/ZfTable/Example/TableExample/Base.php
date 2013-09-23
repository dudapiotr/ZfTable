<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Base extends AbstractTable
{
    
    protected $config = array(
        'name' => 'Base table',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'showColumnFilters' => false,
        'showExportToCSV ' => false,
        'valuesOfItemPerPage' => array(5, 10, 20, 50 , 100 , 200),
        'rowAction' => ''
    );
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'name' => array('title' => 'Name' , 'filters' => 'text'),
        'surname' => array('title' => 'Surname' , 'filters' => 'text' ),
        'street' => array('title' => 'Street' , 'filters' => 'text'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active' , 'width' => 100 , 'filters' => array( null => 'All' , 1 => 'Active' , 0 => 'Inactive')),
    );

    public function init()
    {
    }
    
    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
       
    }
}