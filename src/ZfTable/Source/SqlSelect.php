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
    public function getSource()
    {
        return $this->select;
    }

    /**
     * Return data as PDO statement
     *
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

            $this->order();

            $this->initPaginator();
        }
        return $this->paginator;
    }

    /**
     * Setting ordering
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

    /*
     * Init quick search
     */
    protected function quickSearch()
    {
        if ($this->getQuickSearchQuery()) {
            $where = $this->getQuickSearchQuery()->getRawState('where');
            $this->select->where($where);
        }
    }
}
