<?php

namespace ZfTable\Options;

interface PaginatorInterface
{

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