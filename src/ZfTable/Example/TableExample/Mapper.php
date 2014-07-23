<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Mapper extends AbstractTable
{

    protected $config = array(
        'name' => 'Mapper decorator',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 10,
    );
    
     //Definition of headers
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
        $this->getHeader('active')->getCell()->addDecorator('mapper', array(
            '0' => 'NO',
            '1' => 'YES'
        ));
       
    }


}