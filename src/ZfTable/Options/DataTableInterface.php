<?php

namespace ZfTable\Options;

interface DataTableInterface
{

    /**
     * Get maximal rows to returning 
     * 
     * @return int
     */
    public function getDataTablesMaxRows();

    /**
     * Set maximal rows to returning.
     * 
     * @param int $dataTablesMaxRows
     * @return \ZfTable\Options\ModuleOptions
     */
    public function setDataTablesMaxRows($dataTablesMaxRows);
}