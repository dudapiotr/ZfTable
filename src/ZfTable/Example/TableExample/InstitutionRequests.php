<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class InstitutionRequests extends AbstractTable
{
    
    protected $config = array(
        'name' => 'Institution Requests',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 10,
        'showColumnFilters' => true,

    );
    
    
    //Definition of headers
    protected $headers = array(
        'address' => array('title' => 'Address' , 'filters' => 'text'),// from institution table
    	'name' => array('title' => 'Name') ,// from user table

    );

    public function init()
    {

    }

    protected function initFilters($query)
    {
        if ($value = $this->getParamAdapter()->getValueOfFilter('address')) {
            $query->where("address like '%".$value."%' ");
        }
    }

}