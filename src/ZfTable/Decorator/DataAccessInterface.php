<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator;

interface DataAccessInterface
{
    /**
     * Interface dedicated for Cells and Rows decorators,
     *
     * used to retrieve actual row in rendering process
     * Header decorators are not taken into consideration
     *
     * @return mixed
     */
    public function getActualRow();
}
