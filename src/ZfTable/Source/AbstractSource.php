<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Source;

use ZfTable\AbstractCommon;
use ZfTable\Source\SourceInterface;

abstract class AbstractSource extends AbstractCommon implements SourceInterface
{
    
    /**
     *
     * @var \ZfTable\Params\AdapterInterface 
     */
    protected $paramAdapter;
    
    
    abstract protected function limit();

    abstract protected function order();
    
    abstract protected function quickSearch();
    
    /**
     *
     * @var \ZfTable\Params\AdapterInterface 
     */
    public function getParamAdapter()
    {
        if (!$this->paramAdapter) {
            $this->paramAdapter = $this->getTable()->getParamAdapter();
        }
        return $this->paramAdapter;
    }
}
