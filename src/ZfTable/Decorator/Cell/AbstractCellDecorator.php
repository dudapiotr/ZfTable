<?php

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\AbstractDecorator;
use ZfTable\Decorator\DataAccessInterface;

abstract class AbstractCellDecorator extends AbstractDecorator implements DataAccessInterface

{

    /**
     * Get cell object
     * @var ZfTable\Cell
     */
    protected $cell;

    /**
     * 
     * @return \ZfTable\Cell
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * 
     * @param \ZfTable\Cell $cell
     * @return \ZfTable\Decorator\Cell\AbstractCell
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
        return $this;
    }

    
    /**
     * Actual row data
     * @return array
     */
    public function getActualRow()
    {
        return $this->getCell()->getActualRow();
    }
}

