<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class CsvExport extends AbstractTable
{
    
    protected $config = array(
        'name' => 'CSV Export',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'showExportToCSV ' => true
    );
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'name' => array('title' => 'Name' ),
        'surname' => array('title' => 'Surname' ),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active' , 'width' => 100 ),
    );

    public function init()
    {
    }

    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
    }
}