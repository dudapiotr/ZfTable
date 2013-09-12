<?php

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
