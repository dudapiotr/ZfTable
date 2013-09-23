<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class NewPluginCondition extends AbstractTable
{
    
    protected $config = array(
        'name' => 'New condition plugin (Between, GreaterThan, LesserThan )',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
    );
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'name' => array('title' => 'Name' ),
        'surname' => array('title' => 'Surname' ),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City' ),
        'age' => array('title' => 'Age' ),
        'active' => array('title' => 'Active' , 'width' => 100 ),
    );

    public function init()
    {
        $this->getHeader('age')->getCell()->addDecorator('varattr', array('style' => 'color: blue'))
                ->addCondition('between', array('column' => 'age' , 'min' => 10, 'max' => 30));
        
        $this->getHeader('age')->getCell()->addDecorator('varattr', array('style' => 'rgb(255, 0, 245)'))
                ->addCondition('lesserthan', array('column' => 'age' , 'value' => 10));
        
        $this->getHeader('age')->getCell()->addDecorator('varattr', array('style' => 'color: red'))
                ->addCondition('greaterthan', array('column' => 'age' , 'value' => 30));
    }
    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
    }
}