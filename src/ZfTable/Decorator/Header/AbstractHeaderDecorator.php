<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Decorator\Header;

use ZfTable\Decorator\AbstractDecorator;

abstract class AbstractHeaderDecorator extends AbstractDecorator
{

    /**
     * Header object
     * @var ZfTable\Header
     */
    protected $header;

    /**
     * 
     * @return \ZfTable\Header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * 
     * @param \ZfTable\Header $header
     * @return \ZfTable\Decorator\Header\AbstractHeader
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

}

