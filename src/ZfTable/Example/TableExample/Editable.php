<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Editable extends AbstractTable
{

    protected $config = array(
        'name' => 'Editable table (Db-click on pale yellow space)',
        'showQuickSearch' => false,
        'itemCountPerPage' => 20,
        'showColumnFilters' => true,
        'rowAction' => '/table/updateRow',
    );
    
    
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50'),
        'name' => array('title' => 'Name', 'filters' => 'text', 'editable' => true),
        'surname' => array('title' => 'Surname', 'filters' => 'text'),
        'street' => array('title' => 'Street', 'filters' => 'text'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active', 'width' => 100),
    );

    public function init()
    {
        $this->getHeader('surname')->getCell()->addDecorator('editable');
        $this->getRow()->addDecorator('varattr', array('name' => 'data-row' , 'value' => '%s' , 'vars' => array('idcustomer')));
    }

    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
        if ($value = $this->getParamAdapter()->getValueOfFilter('name')) {
            $query->where("name like '%" . $value . "%' ");
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('surname')) {
            $query->where("surname like '%" . $value . "%' ");
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('street')) {
            $query->where("street like '%" . $value . "%' ");
        }
    }

}