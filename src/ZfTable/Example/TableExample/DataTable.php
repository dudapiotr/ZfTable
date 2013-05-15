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

    public function initQuickSearch()
    {
        
    }

}
