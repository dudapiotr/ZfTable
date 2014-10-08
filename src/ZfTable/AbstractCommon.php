<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */


namespace ZfTable;

abstract class AbstractCommon
{

    /**
     * Table object
     * @var AbstractTable
     */
    protected $table;

    /**
     *
     * @return AbstractTable
     */
    public function getTable()
    {
        return $this->table;
    }


    /**
     *
     * @param AbstractTable $table
     * @return \ZfTable\AbstractCommon
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }
}
