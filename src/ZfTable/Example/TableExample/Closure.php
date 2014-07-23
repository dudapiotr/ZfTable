<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Closure extends AbstractTable
{

    protected $config = array(
        'name' => 'Closure',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
    );
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'closureColumn' => array('title' => 'Closure'),
        'name' => array('title' => 'Name' , 'separatable' => true),
        'surname' => array('title' => 'Surname' ),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City' , 'separatable' => true),
        'active' => array('title' => 'Active' , 'width' => 100 ),
    );

    public function init()
    {
        $this->getHeader('closureColumn')->getCell()->addDecorator('closure', array(
            'closure' => function($context, $record){
                return ' Imię : ' . $record['name'] . ', Nazwisko: '. $record['surname'];
            }
        ));
    }

   

}