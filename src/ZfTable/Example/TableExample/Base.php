<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class Base extends AbstractTable
{

    //Definition of headers
    protected $headers = array(
        'id' => array('title' => 'Id', 'width' => '50'),
        'artist' => array('title' => 'Artist'),
        'title' => array('title' => 'Title')
    );

    public function init()
    {
        $this->getHeader('artist')->addAttr('id', 'zfTableExample');
        $this->getHeader('artist')->getCell()->addDecorator('class', array('class' => 'sss'));

        $this->getRow()->addAttr('test', 'newattr');
        $this->getRow()->addClass('class', 'nowaklasa1');

        $this->getRow()->addDecorator('class', array('class' => 'nowaklasa'));

        
        
       $this->getHeader('artist')->getCell()->addDecorator('link', array(
            'url' => 'http://zf2/artist/%s',
            'vars' => array('id')
        ))->addCondition('equal', array('column' => 'artist', 'values' => 'Adele'));
       
       
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