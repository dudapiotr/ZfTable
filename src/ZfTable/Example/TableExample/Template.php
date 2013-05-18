<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Template extends AbstractTable
{

     //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50'),
        'name' => array('title' => 'Name'),
        'surname' => array('title' => 'Full name'),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active'),
    );

    public function init()
    {
        $this->getHeader('surname')->getCell()->addDecorator('template', array(
            'template' => '<strong>%s %s</strong>',
            'vars' => array('name', 'surname')
        ));

    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}