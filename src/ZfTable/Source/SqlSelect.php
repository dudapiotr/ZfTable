<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License 
 */


namespace ZfTable\Source;

use ZfTable\Source\AbstractSource;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\DbSelect;

;

class SqlSelect extends AbstractSource
{

    /**
     *
     * @var \Zend\Db\Sql\Select 
     */
    protected $quickSearchQuery;

    /**
     *
     * @var \Zend\Db\Sql\Select 
     */
    protected $select;

    /**
     *
     * @var  \Zend\Paginator\Paginator
     */
    protected $paginator;

    

    /**
     * 
     * @param \Zend\Db\Sql\Select $select
     */
    public function __construct($select)
    {
        $this->select = $select;
    }

    /**
     * 
     * @return \Zend\Db\Sql\Select
     */
    public function getSelect()
    {
        return $this->select;
    }

    
    /**
     * 
     * @return \Zend\Db\Sql\Select 
     */
    public function getQuickSearchQuery()
    {
        return $this->quickSearchQuery;
    }

    /**
     * Set quick search query
     * @param \Zend\Db\Sql\Select $quickSearchQuery
     */
    public function setQuickSearchQuery(\Zend\Db\Sql\Select $quickSearchQuery)
    {
        $this->quickSearchQuery = $quickSearchQuery;
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
     * Return data as PDO statemant
     * not-used
     * @return type
     */
    protected function getDataAsPdoStatement()
    {
        $statement = $this->getSql()->prepareStatementForSqlObject($this->select);
        return $statement->execute();
    }

    /**
     *  
     * @return \Zend\Paginator\Paginator
     */
    public function getPaginator()
    {
        if (!$this->paginator) {
            $adapter = new DbSelect($this->getSelect(), $this->getTable()->getAdapter());
            $this->paginator = new Paginator($adapter);
            $this->initQuery();
            $this->initPaginator();
        }
        return $this->paginator;
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

    /**
     * Init paginator
     */
    protected function initPaginator()
    {
        $this->paginator->setItemCountPerPage($this->getParamAdapter()->getItemCountPerPage());
        $this->paginator->setCurrentPageNumber($this->getParamAdapter()->getPage());
    }

    
    /**
     * Init query like ordering and quicksearching
     */
    private function initQuery()
    {
        $this->order();
        $this->quickSearch();
    }

    /**
     * Not use (using paginator)
     */
    protected function limit()
    {
        
    }

    /**
     * Not use (using paginator)
     */
    protected function offset()
    {
    }

    /*
     * Init quicksearch
     */
    protected function quickSearch()
    {
        if ($this->getQuickSearchQuery()) {
            $where = $this->getQuickSearchQuery()->getRawState('where');
            $this->select->where($where);
        }
    }

    /**
     * Setting orderding
     */
    protected function order()
    {
        $column = $this->getParamAdapter()->getColumn();
        $order = $this->getParamAdapter()->getOrder();
        if ($column) {
            $this->select->reset('order');
            $this->select->order($column . ' ' . $order);
        }
    }

}