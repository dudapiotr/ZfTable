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
        $this->getHeader('artist')->getCell()->addDecorator('icon', array(
            'path' => '/img/zf2-logo.png',
            'place' => \ZfTable\Decorator\AbstractDecorator::RESET_CONTEXT
        ));

    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}