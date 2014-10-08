<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class DataTable extends AbstractTable
{

    protected $config = array(
        'name' => 'Data table integration',
    );

    /**
     * @var array Definition of headers
     */
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'name' => array('title' => 'Name' ),
        'surname' => array('title' => 'Surname' ),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City' ),
        'active' => array('title' => 'Active' , 'width' => 100 ),
    );

    public function init()
    {
        //Table attributes
        $this->addAttr('id', 'zfDataTableExample');
        $this->addClass('display');
    }

    protected function initFilters($query)
    {

    }
}
