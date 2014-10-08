<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Attr extends AbstractTable
{

    protected $config = array(
        'name' => 'Configure attributes',
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
        //Attr and class for table
        $this->addClass('tableClass');
        $this->addAttr('tableAttr', 'tableAttrValue');

         //Attr and class for header
        $this->getHeader('name')->addAttr('attr', 'example');
        $this->getHeader('name')->addClass('new-class');

         //Attr and class for row
        $this->getRow()->addAttr('test', 'newattr');
        $this->getRow()->addClass('class', 'nowaklasa1');

         //Attr and class for cell
        $this->getHeader('surname')->getCell()->addAttr('cellAttr', 'cellAttrValue');
        $this->getHeader('surname')->getCell()->addDecorator('class', array('class' => 'sss'));

    }
}
