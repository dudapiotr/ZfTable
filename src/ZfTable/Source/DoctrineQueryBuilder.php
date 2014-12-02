<?php
namespace ZfTable\Source;

use ZfTable\Source\AbstractSource;
use Zend\Paginator\Paginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;

class DoctrineQueryBuilder extends AbstractSource
{

    /**
     *
     * @var \Doctrine\ORM\QueryBuilder
     */
    protected $query;

    /**
     *
     * @var  \Zend\Paginator\Paginator
     */
    protected $paginator;

    /**
     *
     * @param \Doctrine\ORM\QueryBuilder $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     *
     * @return \Zend\Paginator\Paginator
     */
    public function getPaginator()
    {
        if (!$this->paginator) {


            $this->order();

             $adapter = new DoctrineAdapter(new ORMPaginator($this->query));
             $this->paginator = new Paginator($adapter);
             $this->initPaginator();

        }
        return $this->paginator;
    }



    protected function order()
    {
        $column = $this->getParamAdapter()->getColumn();
        $order = $this->getParamAdapter()->getOrder();

        if (!$column) {
            return;
        }

        $header = $this->getTable()->getHeader($column);
        $tableAlias = ($header) ? $header->getTableAlias() : 'q';

        if ($column) {
            if (false === strpos($tableAlias, '.')) {
                $tableAlias = $tableAlias.'.'.$column;
            }
            $this->query->orderBy($tableAlias, $order);
        }
    }


    public function getQuery()
    {
        return $this->query;
    }

    public function getSource()
    {
        return $this->query;
    }
}
