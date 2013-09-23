<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Mix extends AbstractTable
{

    protected $config = array(
        'name' => 'Mix',
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
        $this->getHeader('surname')->getCell()->addDecorator('template', array(
            'template' => '<strong>%s %s</strong>',
            'vars' => array('name', 'surname')
        ));
        
        $this->getHeader('surname')->getCell()->addDecorator('link', array(
            'url' => '/table/link/id/%s',
            'vars' => array('idcustomer')
        ));

    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}