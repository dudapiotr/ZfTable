<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */


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
     * @return self
     */
    public function setValuesOfItemPerPage($valuesOfItemPerPage);
}
