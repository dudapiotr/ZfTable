<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


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