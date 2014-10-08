<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\AbstractDecorator;
use ZfTable\Decorator\DataAccessInterface;

abstract class AbstractCellDecorator extends AbstractDecorator implements DataAccessInterface
{

    /**
     * Get cell object
     * @var \ZfTable\Cell
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
     * @return $this
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
        return $this;
    }


    /**
     * Actual row data
     *
     * @return array
     */
    public function getActualRow()
    {
        return $this->getCell()->getActualRow();
    }
}
