<?php

namespace ZfTable\Decorator\Row;

use ZfTable\Decorator\AbstractDecorator;

abstract class AbstractRowDecorator extends AbstractDecorator
{

    /**
     *
     * @var ZfTable\Row
     */
    protected $row;

    /**
     * 
     * @return \ZfTable\Row
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * 
     * @param \ZfTable\Row $row
     * @return \ZfTable\Decorator\Row\AbstractRow
     */
    public function setRow($row)
    {
        $this->row = $row;
        return $this;
    }

}

