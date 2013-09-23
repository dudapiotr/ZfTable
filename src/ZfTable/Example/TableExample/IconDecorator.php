<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


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