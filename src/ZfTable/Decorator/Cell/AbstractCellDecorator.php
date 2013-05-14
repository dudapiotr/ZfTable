<?php

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\AbstractDecorator;

abstract class AbstractCellDecorator extends AbstractDecorator
{

    /**
     *
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

}

