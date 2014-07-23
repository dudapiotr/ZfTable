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
    

    abstract protected function order();
    
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
    
    /**
     * 
     * @return \Zend\Paginator\Paginator
     */
    public function getData()
    {

        $paginator = $this->getPaginator();
        return $paginator;
    }
    
    
    /**
     * Init query like ordering and quicksearching
     */
    protected function initQuery()
    {
        $this->order();
        $this->quickSearch();
    }
    
    /**
     * Init paginator
     */
    protected function initPaginator()
    {
        $this->paginator->setItemCountPerPage($this->getParamAdapter()->getItemCountPerPage());
        $this->paginator->setCurrentPageNumber($this->getParamAdapter()->getPage());
    }
    
    /**
     * 
     * @param \ZfTable\Source\Zend\Paginator\Paginator $paginator
     */
    public function setPaginator(Zend\Paginator\Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    

    /**
     * 
     * @param \ZfTable\Params\AdapterInterface $paramAdapter
     */
    public function setParamAdapter(\ZfTable\Params\AdapterInterface $paramAdapter)
    {
        $this->paramAdapter = $paramAdapter;
    }
    
    
}
