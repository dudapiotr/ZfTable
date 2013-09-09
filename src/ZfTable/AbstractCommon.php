<?php

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
