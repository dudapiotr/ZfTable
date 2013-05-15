<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class LinkDecorator extends AbstractTable
{

    //Definition of headers
    protected $headers = array(
        'artist' => array('title' => 'Artist'),
        'title' => array('title' => 'Title')
    );

    public function init()
    {
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
       
    }

}