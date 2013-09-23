<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Source;

interface SourceInterface
{

    public function getData();
    
    
    public function setQuickSearchQuery(\Zend\Db\Sql\Select $quickSearchQuery);
    
    /**
     * @return \Zend\Db\Sql\Select
     */
    public function getSelect();
}
