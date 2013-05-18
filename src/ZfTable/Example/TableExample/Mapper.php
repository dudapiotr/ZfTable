<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Mapper extends AbstractTable
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
        $this->getHeader('active')->getCell()->addDecorator('mapper', array(
            '0' => 'NO',
            '1' => 'YES'
        ));
       
    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}