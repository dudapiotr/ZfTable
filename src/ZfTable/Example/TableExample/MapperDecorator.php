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
        $this->getHeader('artist')->getCell()->addDecorator('mapper', array(
            'Adele' => 'AdeleMapping',
            'Gotye' => 'GotyeMapping'
        ));

    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}