<?php

namespace ZfTable\Example\TableExample;

use ZfTable\AbstractTable;

class AttrAndClass extends AbstractTable
{

    //Definition of headers
    protected $headers = array(
        'artist' => array('title' => 'Artist'),
        'title' => array('title' => 'Title')
    );

    public function init()
    {
        $this->addClass('tableClass');
        $this->addAttr('tableAttr', 'tableAttrValue');
        
        $this->getHeader('artist')->addAttr('attr', 'example');
        $this->getHeader('artist')->addClass('new-class');
        
        $this->getRow()->addAttr('test', 'newattr');
        $this->getRow()->addClass('class', 'nowaklasa1');
        
        $this->getHeader('artist')->getCell()->addAttr('cellAttr', 'cellAttrValue');
        $this->getHeader('artist')->getCell()->addDecorator('class', array('class' => 'sss'));

    }

    /**
     * Initializable where quick search
     */
    public function initQuickSearch()
    {
       
    }

}