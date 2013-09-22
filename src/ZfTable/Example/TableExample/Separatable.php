<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Separatable extends AbstractTable
{
    
    protected $config = array(
        'name' => 'Separatable decorator',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
    );
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'name' => array('title' => 'Name' , 'separatable' => true),
        'surname' => array('title' => 'Surname' ),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City' , 'separatable' => true),
        'active' => array('title' => 'Active' , 'width' => 100 ),
    );

    public function init()
    {
        $this->getRow()->addDecorator('separatable', array('defaultColumn' => 'city'));
    }

    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
    }
}