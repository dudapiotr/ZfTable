<?php

namespace ZfTable\Options;

interface PaginatorInterface
{

    /**
     * Item count per page (for pagination)
     * @return int
     */
    public function getDefaultItemCountPerPage();

    
     /**
     * Item count per page (for pagination)
     * @return int
     */
    public function setDefaultItemCountPerPage($defaultItemCountPerPage);
    
    
    /**
     * Get Array of values to set items per page
     * @return array
     */
    public function getValuesOfItemPerPage();

    /**
     * 
     * Set Array of values to set items per page
     * 
     * @param array $valuesOfItemPerPage
     * @return \ZfTable\Options\ModuleOptions
     */
    public function setValuesOfItemPerPage($valuesOfItemPerPage);
}