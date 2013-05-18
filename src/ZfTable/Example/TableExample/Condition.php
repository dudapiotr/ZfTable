<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Condition extends AbstractTable
{

     //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50'),
        'name' => array('title' => 'Name'),
        'surname' => array('title' => 'Surname'),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active'),
    );

    
    public function init()
    {
        $this->getHeader('name')->getCell()->addDecorator('link', array(
            'url' => '/table/link/id/%s',
            'vars' => array('idcustomer')
        ))->addCondition('equal', array('column' => 'name', 'values' => 'Jan'));
        
         $this->getHeader('city')->getCell()->addDecorator('link', array(
            'url' => '/table/link/id/%s',
            'vars' => array('idcustomer')
        ))->addCondition('equal', array('column' => 'city', 'values' => 'Warszawa'));

    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}