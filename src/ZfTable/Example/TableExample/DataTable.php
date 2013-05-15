<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class DataTable extends AbstractTable
{

    protected $headers = array(
        'artist' => array('title' => 'Artist'),
        'title' => array('title' => 'Title')
    );

    public function init()
    {
        //Table attributes
        $this->addAttr('id', 'zfDataTableExample');
        $this->addClass('display');
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
            $quickSearchQuery->where('artist like "%'.$quickSearchValue.'%"');
            $this->getSource()->setQuickSearchQuery($quickSearchQuery);
        }
    }

}
