<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Base extends AbstractTable
{
    
    protected $config = array(
        'name' => 'Wyceny',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'areFilters' => true,
    );
    
    
    //Definition of headers
    protected $headers = array(
        'idcustomer' => array('title' => 'Id', 'width' => '50', 'filters' => 'text'),
        'name' => array('title' => 'Name', 'filters' => array('1' => 'Abcdefgh')),
        'surname' => array('title' => 'Surname'),
        'street' => array('title' => 'Street'),
        'city' => array('title' => 'City'),
        'active' => array('title' => 'Active'),
    );

    public function init()
    {
       
    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
        $quickSearchValue = $this->getParamAdapter()->getQuickSearch();
        $quickSearchQuery = new \Zend\Db\Sql\Select();

        if (strlen($quickSearchValue)) {
            //Unsecure query (without quote)
            $quickSearchQuery->where('name like "%'.$quickSearchValue.'%"')
                             ->where('surname like "%'.$quickSearchValue.'%"');
            $this->getSource()->setQuickSearchQuery($quickSearchQuery);
        }
    }

}