<?php

namespace ZfTable\Decorator\Header;

use ZfTable\Decorator\AbstractDecorator;

abstract class AbstractHeaderDecorator extends AbstractDecorator
{

    /**
     *
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

