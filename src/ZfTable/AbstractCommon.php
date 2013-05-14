<?php

namespace ZfTable;

abstract class AbstractCommon
{

    /**
     *
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

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

}
