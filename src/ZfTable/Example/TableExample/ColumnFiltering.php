<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class ColumnFiltering extends AbstractTable
{
    
    protected $config = array(
        'name' => 'Filtering by column',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'showColumnFilters' => true,
    );
    
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50') ,
        'name' => array('title' => 'Name' , 'filters' => 'text'),
        'surname' => array('title' => 'Surname' , 'filters' => 'text' ),
        'street' => array('title' => 'Street' , 'filters' => 'text'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active' , 'width' => 100 , 'filters' => array( null => 'All' , 1 => 'Active' , 0 => 'Inactive')),
    );

    public function init()
    {
        
    }

    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
        if ($value = $this->getParamAdapter()->getValueOfFilter('name')) {
            $query->where("name like '%".$value."%' ");
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('surname')) {
            $query->where("surname like '%".$value."%' ");
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('street')) {
            $query->where("street like '%".$value."%' ");
        }
        $value = $this->getParamAdapter()->getValueOfFilter('active');
        if ($value != null) {
            $query->where("active = '".$value."' ");
            
        }
    }

}