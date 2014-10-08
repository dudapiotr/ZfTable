<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */


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

    /**
     * @var array Definition of headers
     */
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

    protected function initFilters($query)
    {

    }
}
