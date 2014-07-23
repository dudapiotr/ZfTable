<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Template extends AbstractTable
{

    protected $config = array(
        'name' => 'Template decorator',
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
        $this->getHeader('surname')->getCell()->addDecorator('template', array(
            'template' => '<strong>%s %s</strong>',
            'vars' => array('name', 'surname')
        ));

    }

}