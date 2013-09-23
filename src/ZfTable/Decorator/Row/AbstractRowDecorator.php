<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Decorator\Row;

use ZfTable\Decorator\AbstractDecorator;
use ZfTable\Decorator\DataAccessInterface;

abstract class AbstractRowDecorator extends AbstractDecorator implements DataAccessInterface
{

    /**
     * Row object
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
    
    
    /**
     * Get actual row
     * @return array
     */
    public function getActualRow()
    {
        return $this->getRow()->getActualRow();
    }


}

