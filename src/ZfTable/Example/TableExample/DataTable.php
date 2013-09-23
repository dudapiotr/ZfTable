<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class DataTable extends AbstractTable
{

    protected $config = array(
        'name' => 'Data table integration',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
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
        //Table attributes
        $this->addAttr('id', 'zfDataTableExample');
        $this->addClass('display');
    }

    
    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
       
    }

}
